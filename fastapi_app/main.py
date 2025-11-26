import hashlib
import json
import os
import random
import string
from datetime import datetime, timedelta
from typing import List, Optional

from fastapi import Depends, FastAPI, HTTPException, Header
from fastapi.middleware.cors import CORSMiddleware
from fastapi.staticfiles import StaticFiles
from pydantic import BaseModel
from sqlalchemy import (Boolean, Column, DateTime, Float, Integer, String,
                        create_engine, func)
from sqlalchemy.orm import Session, declarative_base, sessionmaker

DATABASE_URL = os.environ.get("GAME_DB", "sqlite:///" + os.path.join(os.path.dirname(__file__), "game.db"))
ENTRY_FEE = 10
MAX_TIME = 180.0

engine = create_engine(
    DATABASE_URL, connect_args={"check_same_thread": False}
)
SessionLocal = sessionmaker(autocommit=False, autoflush=False, bind=engine)
Base = declarative_base()


class User(Base):
    __tablename__ = "users"
    id = Column(Integer, primary_key=True, index=True)
    username = Column(String, unique=True, nullable=False)
    token = Column(String, unique=True, nullable=False)
    equipped_skin = Column(String, default="ember")
    created_at = Column(DateTime, default=datetime.utcnow)


class UserSkin(Base):
    __tablename__ = "user_skins"
    id = Column(Integer, primary_key=True)
    user_id = Column(Integer, index=True, nullable=False)
    skin_key = Column(String, nullable=False)
    owned = Column(Boolean, default=True)
    created_at = Column(DateTime, default=datetime.utcnow)


class LedgerEntry(Base):
    __tablename__ = "ledger_entries"
    id = Column(Integer, primary_key=True, index=True)
    user_id = Column(Integer, index=True, nullable=False)
    type = Column(String, nullable=False)
    amount = Column(Integer, nullable=False)
    ref_id = Column(String, nullable=True)
    created_at = Column(DateTime, default=datetime.utcnow)


class Run(Base):
    __tablename__ = "runs"
    id = Column(Integer, primary_key=True, index=True)
    user_id = Column(Integer, index=True)
    mode = Column(String, nullable=False)
    level = Column(Integer, nullable=False)
    seed = Column(Integer, nullable=False)
    stake = Column(Integer, default=ENTRY_FEE)
    ghost_run_id = Column(Integer, nullable=True)
    status = Column(String, default="active")
    completed = Column(Boolean, default=False)
    result_time = Column(Float, nullable=True)
    deaths = Column(Integer, default=0)
    verified = Column(Boolean, default=False)
    events_hash = Column(String, nullable=True)
    cashed_out = Column(Boolean, default=False)
    rolled = Column(Boolean, default=False)
    created_at = Column(DateTime, default=datetime.utcnow)
    updated_at = Column(DateTime, default=datetime.utcnow, onupdate=datetime.utcnow)


class RunEvent(Base):
    __tablename__ = "run_events"
    id = Column(Integer, primary_key=True)
    run_id = Column(Integer, index=True)
    payload = Column(String)  # JSON
    created_at = Column(DateTime, default=datetime.utcnow)


class PaymentProvider:
    name = "base"

    def charge(self, db: Session, user: User, amount: int, reason: str):
        raise NotImplementedError

    def credit(self, db: Session, user: User, amount: int, reason: str, ref_id: Optional[str] = None):
        raise NotImplementedError


class InternalLedgerProvider(PaymentProvider):
    name = "internal"

    def charge(self, db: Session, user: User, amount: int, reason: str):
        if amount <= 0:
            return
        LedgerEntry = globals()["LedgerEntry"]
        db.add(LedgerEntry(user_id=user.id, type=reason, amount=-abs(amount)))

    def credit(self, db: Session, user: User, amount: int, reason: str, ref_id: Optional[str] = None):
        if amount == 0:
            return
        LedgerEntry = globals()["LedgerEntry"]
        db.add(LedgerEntry(user_id=user.id, type=reason, amount=abs(amount), ref_id=ref_id))


class Web3Provider(PaymentProvider):
    name = "web3-placeholder"

    def charge(self, db: Session, user: User, amount: int, reason: str):
        raise HTTPException(status_code=400, detail="Web3 provider not enabled")

    def credit(self, db: Session, user: User, amount: int, reason: str, ref_id: Optional[str] = None):
        raise HTTPException(status_code=400, detail="Web3 provider not enabled")


def init_db():
    Base.metadata.create_all(bind=engine)


def get_db():
    db = SessionLocal()
    try:
        yield db
    finally:
        db.close()


def random_token(length: int = 32) -> str:
    return "".join(random.choice(string.ascii_letters + string.digits) for _ in range(length))


def compute_balance(db: Session, user: User) -> int:
    total = db.query(func.sum(LedgerEntry.amount)).filter(LedgerEntry.user_id == user.id).scalar()
    return int(total or 0)


def ensure_default_inventory(db: Session, user: User):
    default_skins = ["ember", "frost", "onyx"]
    owned = db.query(UserSkin).filter(UserSkin.user_id == user.id).all()
    owned_keys = {s.skin_key for s in owned}
    for skin in default_skins:
        if skin not in owned_keys:
            db.add(UserSkin(user_id=user.id, skin_key=skin, owned=True))


def auth_user(token: Optional[str], db: Session) -> User:
    if not token:
        raise HTTPException(status_code=401, detail="Missing session token")
    user = db.query(User).filter(User.token == token).first()
    if not user:
        raise HTTPException(status_code=401, detail="Invalid session")
    return user


app = FastAPI(title="Sprint Arc")
app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"]
)
static_dir = os.path.join(os.path.dirname(__file__), "static")
app.mount("/static", StaticFiles(directory=static_dir, html=True), name="static")

payment_provider = InternalLedgerProvider()


class LoginRequest(BaseModel):
    username: str


class TopUpRequest(BaseModel):
    amount: int = 50


class RunStartRequest(BaseModel):
    mode: str
    level: int


class EventBatchRequest(BaseModel):
    events: List[dict]


class FinishRequest(BaseModel):
    completed: bool
    result_time: float
    deaths: int
    events_hash: str


class LeaderboardQuery(BaseModel):
    mode: str
    level: int
    range: str = "all"
    limit: int = 20
    offset: int = 0


@app.on_event("startup")
def on_startup():
    init_db()


def build_user_payload(db: Session, user: User):
    ensure_default_inventory(db, user)
    balance = compute_balance(db, user)
    skins = db.query(UserSkin).filter(UserSkin.user_id == user.id).all()
    inventory = [{"skin": s.skin_key, "owned": s.owned, "equipped": s.skin_key == user.equipped_skin} for s in skins]
    return {
        "id": user.id,
        "username": user.username,
        "equipped_skin": user.equipped_skin,
        "inventory": inventory,
        "balance": balance
    }


@app.post("/api/login")
def login(payload: LoginRequest, db: Session = Depends(get_db)):
    username = payload.username.strip().lower()
    if not username:
        raise HTTPException(status_code=400, detail="Username required")
    user = db.query(User).filter(User.username == username).first()
    if not user:
        user = User(username=username, token=random_token())
        db.add(user)
        db.commit()
        db.refresh(user)
        ensure_default_inventory(db, user)
        payment_provider.credit(db, user, 200, "welcome")
    db.commit()
    return {"token": user.token, "profile": build_user_payload(db, user)}


@app.get("/api/me")
def me(x_session_token: Optional[str] = Header(None), db: Session = Depends(get_db)):
    user = auth_user(x_session_token, db)
    return build_user_payload(db, user)


@app.post("/api/topup")
def topup(payload: TopUpRequest, x_session_token: Optional[str] = Header(None), db: Session = Depends(get_db)):
    user = auth_user(x_session_token, db)
    payment_provider.credit(db, user, payload.amount, "topup")
    db.commit()
    return {"balance": compute_balance(db, user)}


def pick_ghost(db: Session, mode: str, level: int, user_id: int) -> Optional[int]:
    ghost = (
        db.query(Run)
        .filter(Run.mode == mode, Run.level == level, Run.verified == True, Run.user_id != user_id)
        .order_by(Run.result_time.asc())
        .first()
    )
    return ghost.id if ghost else None


def calculate_events_hash(events: List[dict]) -> str:
    canonical = "".join(f"{e.get('t')}|{e.get('action')}|" for e in events)
    return hashlib.sha256(canonical.encode()).hexdigest()


@app.post("/api/run/start")
def run_start(payload: RunStartRequest, x_session_token: Optional[str] = Header(None), db: Session = Depends(get_db)):
    user = auth_user(x_session_token, db)
    balance = compute_balance(db, user)
    if balance < ENTRY_FEE:
        raise HTTPException(status_code=402, detail="Insufficient ARD for entry fee")
    payment_provider.charge(db, user, ENTRY_FEE, "entry_fee")
    seed = random.randint(1, 999999)
    ghost_id = pick_ghost(db, payload.mode, payload.level, user.id)
    run = Run(
        user_id=user.id,
        mode=payload.mode,
        level=payload.level,
        seed=seed,
        stake=ENTRY_FEE,
        ghost_run_id=ghost_id,
    )
    db.add(run)
    db.commit()
    db.refresh(run)
    return {"run_id": run.id, "seed": seed, "hearts": 3, "ghost_run_id": ghost_id}


@app.post("/api/run/event_batch/{run_id}")
def save_events(run_id: int, payload: EventBatchRequest, x_session_token: Optional[str] = Header(None), db: Session = Depends(get_db)):
    user = auth_user(x_session_token, db)
    run = db.query(Run).filter(Run.id == run_id, Run.user_id == user.id).first()
    if not run:
        raise HTTPException(status_code=404, detail="Run not found")
    db.add(RunEvent(run_id=run.id, payload=json.dumps(payload.events)))
    db.commit()
    return {"stored": len(payload.events)}


@app.post("/api/run/finish/{run_id}")
def finish_run(run_id: int, payload: FinishRequest, x_session_token: Optional[str] = Header(None), db: Session = Depends(get_db)):
    user = auth_user(x_session_token, db)
    run = db.query(Run).filter(Run.id == run_id, Run.user_id == user.id).first()
    if not run:
        raise HTTPException(status_code=404, detail="Run not found")
    if run.completed:
        return {"status": "already_finished"}

    stored_events = []
    for batch in db.query(RunEvent).filter(RunEvent.run_id == run.id).order_by(RunEvent.id.asc()).all():
        try:
            stored_events.extend(json.loads(batch.payload))
        except Exception:
            continue
    computed_hash = calculate_events_hash(stored_events)
    plausible = payload.result_time > 0 and payload.result_time <= MAX_TIME and payload.deaths <= 25
    verified = payload.completed and plausible and computed_hash == payload.events_hash

    run.completed = payload.completed
    run.result_time = payload.result_time
    run.deaths = payload.deaths
    run.events_hash = payload.events_hash
    run.verified = verified
    run.status = "done"
    run.updated_at = datetime.utcnow()
    db.commit()
    return {"verified": verified, "plausible": plausible}


@app.post("/api/run/cashout/{run_id}")
def cashout(run_id: int, x_session_token: Optional[str] = Header(None), db: Session = Depends(get_db)):
    user = auth_user(x_session_token, db)
    run = db.query(Run).filter(Run.id == run_id, Run.user_id == user.id).first()
    if not run or not run.completed:
        raise HTTPException(status_code=400, detail="Run not ready")
    if run.cashed_out:
        return {"status": "already_cashed"}
    reward = run.stake * (2 if run.completed and run.verified else 0)
    run.cashed_out = True
    payment_provider.credit(db, user, reward, "cashout", ref_id=str(run.id))
    db.commit()
    return {"reward": reward, "balance": compute_balance(db, user)}


@app.post("/api/run/allin/{run_id}")
def all_in(run_id: int, x_session_token: Optional[str] = Header(None), db: Session = Depends(get_db)):
    user = auth_user(x_session_token, db)
    run = db.query(Run).filter(Run.id == run_id, Run.user_id == user.id).first()
    if not run or not run.completed or run.rolled:
        raise HTTPException(status_code=400, detail="Run not eligible")
    if not run.verified:
        raise HTTPException(status_code=400, detail="Only verified runs can roll")
    new_stake = run.stake * 2
    run.rolled = True
    seed = random.randint(1, 999999)
    next_level = min(run.level + 1, 20)
    ghost_id = pick_ghost(db, run.mode, next_level, user.id)
    next_run = Run(
        user_id=user.id,
        mode=run.mode,
        level=next_level,
        seed=seed,
        stake=new_stake,
        ghost_run_id=ghost_id,
    )
    db.add(next_run)
    db.commit()
    db.refresh(next_run)
    return {"run_id": next_run.id, "seed": seed, "hearts": 3, "ghost_run_id": ghost_id, "stake": new_stake}


@app.get("/api/ghost/{run_id}")
def ghost(run_id: int, x_session_token: Optional[str] = Header(None), db: Session = Depends(get_db)):
    user = auth_user(x_session_token, db)
    run = db.query(Run).filter(Run.id == run_id).first()
    if not run:
        raise HTTPException(status_code=404, detail="Run not found")
    ghost_id = run.ghost_run_id
    if not ghost_id:
        return {"events": []}
    events = []
    for batch in db.query(RunEvent).filter(RunEvent.run_id == ghost_id).order_by(RunEvent.id.asc()).all():
        try:
            events.extend(json.loads(batch.payload))
        except Exception:
            continue
    ghost_run = db.query(Run).filter(Run.id == ghost_id).first()
    return {
        "ghost_run_id": ghost_id,
        "meta": {
            "time": ghost_run.result_time if ghost_run else None,
            "deaths": ghost_run.deaths if ghost_run else None
        },
        "events": events,
    }


def leaderboard_window(range_value: str):
    now = datetime.utcnow()
    if range_value == "today":
        return now - timedelta(days=1)
    if range_value == "week":
        return now - timedelta(days=7)
    return None


@app.get("/api/leaderboard")
def leaderboard(mode: str, level: int, range: str = "all", limit: int = 20, offset: int = 0, x_session_token: Optional[str] = Header(None), db: Session = Depends(get_db)):
    window_start = leaderboard_window(range)
    query = db.query(Run).filter(
        Run.mode == mode,
        Run.level == level,
        Run.completed == True,
        Run.verified == True,
        Run.result_time <= MAX_TIME,
    )
    if window_start:
        query = query.filter(Run.created_at >= window_start)
    query = query.order_by(Run.user_id.asc(), Run.result_time.asc(), Run.deaths.asc(), Run.created_at.asc())
    best_by_user = {}
    for r in query.all():
        if r.user_id not in best_by_user:
            best_by_user[r.user_id] = r
    ordered = sorted(best_by_user.values(), key=lambda r: (r.result_time, r.deaths, r.created_at))
    entries = []
    rank = offset + 1
    for r in ordered[offset: offset + limit]:
        username = db.query(User.username).filter(User.id == r.user_id).scalar() or "runner"
        entries.append({
            "user_id": r.user_id,
            "username": username,
            "time": r.result_time,
            "deaths": r.deaths,
            "created_at": r.created_at.isoformat(),
            "rank": rank
        })
        rank += 1

    me = None
    user = None
    if x_session_token:
        try:
            user = auth_user(x_session_token, db)
        except HTTPException:
            user = None
    my_rank = None
    if user:
        for idx, r in enumerate(ordered):
            if r.user_id == user.id:
                my_rank = idx + 1
                me = {
                    "rank": my_rank,
                    "time": r.result_time,
                    "deaths": r.deaths,
                    "created_at": r.created_at.isoformat()
                }
                break
    return {"entries": entries, "my_rank": my_rank, "my_best": me, "total": len(ordered)}


@app.get("/api/champions/recent")
def champions_recent(limit: int = 10, db: Session = Depends(get_db)):
    runs = (
        db.query(Run)
        .filter(Run.completed == True, Run.verified == True)
        .order_by(Run.created_at.desc())
        .limit(limit)
        .all()
    )
    champions = []
    for r in runs:
        username = db.query(User.username).filter(User.id == r.user_id).scalar() or "runner"
        champions.append({
            "username": username,
            "mode": r.mode,
            "level": r.level,
            "time": r.result_time,
            "deaths": r.deaths,
            "created_at": r.created_at.isoformat(),
        })
    return {"champions": champions}


@app.get("/api/ping")
def ping():
    return {"status": "ok", "now": datetime.utcnow().isoformat()}


# Serve index.html for any unknown path (spa fallback)
@app.get("/{full_path:path}")
def spa(full_path: str):
    index_path = os.path.join(os.path.dirname(__file__), "static", "index.html")
    with open(index_path, "r", encoding="utf-8") as f:
        return f.read()
