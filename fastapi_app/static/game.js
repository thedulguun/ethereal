const screens = ['loginScreen','lobbyScreen','modeScreen','gameScreen','resultScreen','leaderboardScreen'];
let token = localStorage.getItem('sprint_token');
let profile = null;
let currentRun = null;
let events = [];
let runStartAt = 0;
let gameEngine = null;
let leaderboardTimer = null;

const api = async (path, options={}) => {
  const headers = options.headers || {};
  headers['Content-Type'] = 'application/json';
  if (token) headers['X-Session-Token'] = token;
  const res = await fetch(path, {...options, headers});
  if (!res.ok) throw new Error(await res.text());
  return res.json();
};

const showScreen = (id) => {
  screens.forEach(s => document.getElementById(s).classList.remove('active'));
  document.getElementById(id).classList.add('active');
};

const toast = (msg) => {
  const el = document.getElementById('toast');
  el.textContent = msg;
  el.classList.add('show');
  setTimeout(()=>el.classList.remove('show'), 2200);
};

const updateProfileUI = () => {
  if (!profile) return;
  document.getElementById('sessionUser').textContent = profile.username;
  document.getElementById('sessionBalance').textContent = `${profile.balance} ARD`;
  document.getElementById('equippedSkin').textContent = profile.equipped_skin;
  document.getElementById('lobbyGreeting').textContent = `Hey ${profile.username}`;
  document.getElementById('lobbyBalance').textContent = profile.balance;
  document.getElementById('avatarPreview').style.background = skinGradient(profile.equipped_skin);
  const invWrap = document.getElementById('inventoryPreview');
  invWrap.innerHTML = '';
  profile.inventory.forEach(item => {
    const chip = document.createElement('div');
    chip.className = 'chip ' + (item.owned ? 'owned':'');
    chip.textContent = item.skin;
    invWrap.appendChild(chip);
  });
};

const skinGradient = (skin) => {
  const map = {
    ember: 'linear-gradient(180deg,#ff8a5c,#ff3d54)',
    frost: 'linear-gradient(180deg,#7bf0ff,#4b9dff)',
    onyx: 'linear-gradient(180deg,#3a3d5c,#0b0c1f)',
    neon: 'linear-gradient(180deg,#a6ffcb,#12d8fa)',
  };
  return map[skin] || 'linear-gradient(180deg,#7bf0ff,#7a5bff)';
};

const loadTeaser = async () => {
  const data = await api(`/api/leaderboard?mode=single&level=1&range=all&limit=3&offset=0`);
  const wrap = document.getElementById('leaderboardTeaser');
  wrap.innerHTML = data.entries.map(e=>`#${e.rank} ${e.username} · ${e.time.toFixed(2)}s`).join('<br>') || 'No runs yet';
};

const loadChampions = async () => {
  const res = await api('/api/champions/recent');
  const wrap = document.getElementById('recentChampions');
  wrap.innerHTML = '<h4>Recent champions</h4>' + (res.champions.map(c=>`<div>${c.username} · L${c.level} ${c.mode} · ${c.time.toFixed(2)}s</div>`).join('') || '<div>Be the first champion.</div>');
};

const populateLevels = () => {
  const sel = document.getElementById('lbLevel');
  sel.innerHTML = '';
  for (let i=1;i<=20;i++) {
    const opt = document.createElement('option');
    opt.value = i;
    opt.textContent = `Level ${i}`;
    sel.appendChild(opt);
  }
};

const loadLeaderboard = async () => {
  const mode = document.getElementById('lbMode').value;
  const level = document.getElementById('lbLevel').value;
  const range = document.getElementById('lbRange').value;
  const data = await api(`/api/leaderboard?mode=${mode}&level=${level}&range=${range}&limit=15&offset=0`);
  const wrap = document.getElementById('leaderboardTable');
  wrap.innerHTML = '';
  data.entries.forEach(e => {
    const row = document.createElement('div');
    row.className = 'row-entry' + (profile && e.user_id === profile.id ? ' you' : '');
    row.innerHTML = `<div>#${e.rank}</div><div>${e.username}</div><div>${e.time.toFixed(2)}s</div><div>${e.deaths}💀</div>`;
    wrap.appendChild(row);
  });
  document.getElementById('myRank').textContent = data.my_rank ? `You are #${data.my_rank}` : 'Set a verified run to rank';
};

const login = async (username) => {
  const data = await api('/api/login', {method:'POST', body: JSON.stringify({username})});
  token = data.token;
  localStorage.setItem('sprint_token', token);
  profile = data.profile;
  updateProfileUI();
  await loadTeaser();
  await loadChampions();
  showScreen('lobbyScreen');
};

const refreshProfile = async () => {
  profile = await api('/api/me');
  updateProfileUI();
};

const startRun = async (mode) => {
  const level = profile.last_level || 1;
  const res = await api('/api/run/start', {method:'POST', body: JSON.stringify({mode, level})});
  currentRun = {...res, mode, level, stake: 10};
  events = [];
  runStartAt = performance.now();
  document.getElementById('sessionMode').textContent = `${mode} · L${level}`;
  document.getElementById('deathLabel').textContent = '0';
  document.getElementById('timeLabel').textContent = '0.00';
  document.getElementById('heartsLabel').textContent = '3';
  showScreen('gameScreen');
  if (!gameEngine) gameEngine = new RunnerGame(document.getElementById('gameCanvas'));
  const ghostData = currentRun.ghost_run_id ? await api(`/api/ghost/${currentRun.run_id}`) : null;
  gameEngine.start(currentRun.seed, level, mode, ghostData, finishRun, recordEvent);
};

const recordEvent = (action) => {
  const now = performance.now();
  events.push({t: Math.round(now - runStartAt), action});
};

const eventsHash = async () => {
  const canonical = events.map(e=>`${e.t}|${e.action}|`).join('');
  const hashBuffer = await crypto.subtle.digest('SHA-256', new TextEncoder().encode(canonical));
  return Array.from(new Uint8Array(hashBuffer)).map(b=>b.toString(16).padStart(2,'0')).join('');
};

const finishRun = async (result) => {
  const {completed, time, deaths} = result;
  try {
    await api(`/api/run/event_batch/${currentRun.run_id}`, {method:'POST', body: JSON.stringify({events})});
    const finishRes = await api(`/api/run/finish/${currentRun.run_id}`, {method:'POST', body: JSON.stringify({completed, result_time: time, deaths, events_hash: await eventsHash()})});
    const rating = time < 40 ? 'S' : time < 70 ? 'A' : time < 120 ? 'B' : 'C';
    document.getElementById('resultTime').textContent = time.toFixed(2)+'s';
    document.getElementById('resultDeaths').textContent = deaths;
    document.getElementById('resultLevel').textContent = currentRun.level;
    document.getElementById('resultRating').textContent = rating;
    document.getElementById('resultPlacement').textContent = finishRes.verified ? 'Verified run submitted' : 'Unverified (plausibility fail)';
    showScreen('resultScreen');
    refreshProfile();
  } catch (err) {
    toast('Finish failed');
    console.error(err);
  }
};

class RunnerGame {
  constructor(canvas) {
    this.canvas = canvas;
    this.ctx = canvas.getContext('2d');
    this.w = canvas.width;
    this.h = canvas.height;
    this.running = false;
    this.charge = 0;
    this.holding = false;
    this.player = {x:50,y:this.h-80,vy:0,onGround:true};
    this.deaths = 0;
    this.hearts = 3;
    this.startTime = 0;
    this.level = 1;
    this.mode = 'single';
    this.finishDistance = 2200;
    this.scrollX = 0;
    this.obstacles = [];
    this.ghost = null;
    this.ghostPos = 0;
    this.bindInputs();
  }
  bindInputs() {
    document.addEventListener('keydown', (e)=>{
      if (e.code === 'Space' && !this.holding) {
        this.holding = true;
        recordEvent('down');
      }
    });
    document.addEventListener('keyup', (e)=>{
      if (e.code === 'Space' && this.holding) {
        this.triggerJump();
      }
    });
    const btn = document.getElementById('chargeBtn');
    btn.addEventListener('pointerdown', ()=>{ this.holding = true; recordEvent('down'); });
    btn.addEventListener('pointerup', ()=>{ this.triggerJump(); });
    btn.addEventListener('pointerleave', ()=>{ if (this.holding) this.triggerJump(); });
  }
  start(seed, level, mode, ghostData, onFinish, onRecord) {
    this.onFinish = onFinish;
    this.onRecord = onRecord;
    this.running = true;
    this.charge = 0;
    this.holding = false;
    this.player = {x:80,y:this.h-90,vy:0,onGround:true};
    this.deaths = 0;
    this.hearts = 3;
    this.startTime = performance.now();
    this.level = level;
    this.mode = mode;
    this.scrollX = 0;
    this.finishDistance = 1800 + level*70;
    this.obstacles = this.generateObstacles(seed);
    this.ghost = ghostData;
    this.ghostPos = 0;
    this.loop();
  }
  generateObstacles(seed) {
    const rng = mulberry32(seed);
    const obs = [];
    let x = 260;
    while (x < this.finishDistance - 160) {
      const typeRoll = rng();
      const type = typeRoll < 0.25 ? 'rotor' : typeRoll < 0.5 ? 'laser' : typeRoll < 0.75 ? 'crusher' : 'platform';
      const gap = 140 + rng()*160;
      const size = 26 + rng()*28;
      const y = this.h - 120 - rng()*80;
      obs.push({x, y, size, type, phase: rng()*Math.PI*2});
      x += gap;
    }
    return obs;
  }
  triggerJump() {
    if (!this.running) return;
    const power = Math.min(1, this.charge);
    this.player.vy = -9 - power*9;
    this.player.onGround = false;
    this.holding = false;
    this.charge = 0;
    recordEvent('up');
  }
  kill() {
    this.deaths += 1;
    this.hearts -= 1;
    document.getElementById('deathLabel').textContent = this.deaths;
    document.getElementById('heartsLabel').textContent = this.hearts;
    this.canvas.classList.add('screen-shake');
    setTimeout(()=>this.canvas.classList.remove('screen-shake'), 300);
    if (this.hearts <= 0) {
      this.running = false;
      this.onFinish({completed:false, time: (performance.now()-this.startTime)/1000, deaths:this.deaths});
      return;
    }
    this.player.x = Math.max(this.scrollX + 60, 60);
    this.player.y = this.h-90;
    this.player.vy = 0;
    this.player.onGround = true;
  }
  update(dt) {
    const speed = 140 + this.level*4;
    this.scrollX += speed*dt;
    this.player.x += speed*dt;
    if (this.holding) this.charge = Math.min(1.2, this.charge + dt*1.2);
    this.player.vy += 25*dt;
    this.player.y += this.player.vy*4;
    if (this.player.y > this.h-90) {
      this.player.y = this.h-90;
      this.player.vy = 0;
      this.player.onGround = true;
    }
    if (this.player.y < 40) this.player.vy += 12*dt;

    // ghost progress
    if (this.ghost && this.ghost.meta && this.ghost.meta.time) {
      const ghostSpeed = this.finishDistance / this.ghost.meta.time;
      this.ghostPos += ghostSpeed * dt * 60;
    }

    // collisions
    for (const ob of this.obstacles) {
      const relX = ob.x - this.scrollX;
      if (relX < -120) continue;
      if (relX > this.w + 60) break;
      const hazard = this.getHazardBox(ob, dt);
      const px = this.player.x - this.scrollX;
      const py = this.player.y;
      if (Math.abs(px - hazard.cx) < hazard.hw && Math.abs(py - hazard.cy) < hazard.hh) {
        this.kill();
        break;
      }
    }

    const elapsed = (performance.now() - this.startTime)/1000;
    document.getElementById('timeLabel').textContent = elapsed.toFixed(2);
    if (elapsed >= 180) {
      this.running = false;
      this.onFinish({completed:false, time: elapsed, deaths:this.deaths});
    }
    if (this.player.x >= this.finishDistance) {
      this.running = false;
      this.onFinish({completed:true, time: elapsed, deaths:this.deaths});
    }
  }
  getHazardBox(ob, dt) {
    switch(ob.type) {
      case 'laser': {
        const active = Math.sin((performance.now()/500)+(ob.phase)) > 0;
        return {cx: ob.x - this.scrollX, cy: this.h-180, hw: 28, hh: active ? 220 : 4, active};
      }
      case 'crusher': {
        const cycle = Math.abs(Math.sin((performance.now()/700)+ob.phase));
        return {cx: ob.x - this.scrollX, cy: 180 + cycle*260, hw: 32, hh: 26, active: cycle>0.5};
      }
      case 'platform': {
        const offset = Math.sin((performance.now()/800)+ob.phase)*40;
        return {cx: ob.x - this.scrollX, cy: ob.y + offset, hw: ob.size, hh: 14, platform: true};
      }
      default: {
        const rot = (performance.now()/400+ob.phase)%(Math.PI*2);
        return {cx: ob.x - this.scrollX, cy: ob.y, hw: ob.size, hh: ob.size, rot};
      }
    }
  }
  render() {
    const ctx = this.ctx;
    ctx.clearRect(0,0,this.w,this.h);
    // ground
    ctx.fillStyle = '#0f1329';
    ctx.fillRect(0, this.h-70, this.w, 80);
    ctx.fillStyle = '#1f274c';
    ctx.fillRect(0, this.h-78, this.w, 8);

    // finish line
    const finishX = this.finishDistance - this.scrollX;
    ctx.fillStyle = '#7bf0ff';
    ctx.fillRect(finishX-6, this.h-160, 6, 180);

    // obstacles
    for (const ob of this.obstacles) {
      const box = this.getHazardBox(ob);
      const x = ob.x - this.scrollX;
      if (x < -40 || x > this.w+60) continue;
      if (ob.type === 'platform') {
        ctx.fillStyle = '#4ae1a9';
        ctx.fillRect(x-36, box.cy-6, 72, 12);
      } else if (ob.type === 'laser') {
        ctx.strokeStyle = box.active ? '#ff4d6d' : 'rgba(255,77,109,0.4)';
        ctx.lineWidth = 6;
        ctx.beginPath(); ctx.moveTo(x, this.h-70); ctx.lineTo(x, this.h-320); ctx.stroke();
        ctx.setLineDash([10,6]);
        ctx.strokeStyle = 'rgba(255,255,255,0.3)';
        ctx.beginPath(); ctx.moveTo(x, this.h-70); ctx.lineTo(x, this.h-320); ctx.stroke();
        ctx.setLineDash([]);
      } else if (ob.type === 'crusher') {
        ctx.fillStyle = '#ffc857';
        ctx.fillRect(x-34, box.cy-14, 68, 28);
      } else {
        ctx.save();
        ctx.translate(x, box.cy);
        ctx.rotate(box.rot || 0);
        ctx.fillStyle = '#ff8a5c';
        ctx.beginPath();
        ctx.moveTo(-box.hw, -box.hh);
        ctx.lineTo(box.hw, -box.hh);
        ctx.lineTo(0, box.hh);
        ctx.closePath();
        ctx.fill();
        ctx.restore();
      }
    }

    // ghost
    if (this.ghost && this.ghost.meta && this.ghost.meta.time) {
      const gx = this.finishDistance - this.ghostPos - this.scrollX;
      ctx.fillStyle = 'rgba(123,240,255,0.35)';
      ctx.beginPath(); ctx.arc(gx, this.h-90, 14, 0, Math.PI*2); ctx.fill();
    }

    // player
    ctx.fillStyle = '#fff';
    ctx.beginPath(); ctx.arc(this.player.x - this.scrollX, this.player.y, 16, 0, Math.PI*2); ctx.fill();
    ctx.fillStyle = '#7bf0ff';
    ctx.fillRect(this.player.x - this.scrollX -12, this.player.y+16, 24, 4);

    // charge bar
    if (this.holding || this.charge>0) {
      ctx.fillStyle = 'rgba(255,255,255,0.2)';
      ctx.fillRect(16, 16, this.w-32, 10);
      ctx.fillStyle = '#7bf0ff';
      const pct = Math.min(1, this.charge/1);
      ctx.fillRect(16, 16, (this.w-32)*pct, 10);
    }
  }
  loop() {
    if (!this.running) return;
    const now = performance.now();
    const dt = 1/60;
    this.update(dt);
    this.render();
    requestAnimationFrame(()=>this.loop());
  }
}

function mulberry32(a) {
  return function() {
    var t = a += 0x6D2B79F5;
    t = Math.imul(t ^ t >>> 15, t | 1);
    t ^= t + Math.imul(t ^ t >>> 7, t | 61);
    return ((t ^ t >>> 14) >>> 0) / 4294967296;
  }
}

document.getElementById('loginForm').addEventListener('submit', (e)=>{
  e.preventDefault();
  login(document.getElementById('usernameInput').value.trim());
});

document.querySelectorAll('.startMode').forEach(btn=>{
  btn.addEventListener('click', ()=>{
    startRun(btn.dataset.mode);
  });
});

document.getElementById('continueBtn').addEventListener('click', ()=>showScreen('modeScreen'));

document.getElementById('backToLobby').addEventListener('click', ()=>showScreen('lobbyScreen'));

document.getElementById('viewLeaderboard').addEventListener('click', ()=>{ loadLeaderboard(); showScreen('leaderboardScreen'); leaderboardTimer && clearInterval(leaderboardTimer); leaderboardTimer = setInterval(loadLeaderboard, 10000); });

document.getElementById('leaderboardClose').addEventListener('click', ()=>{ showScreen('lobbyScreen'); leaderboardTimer && clearInterval(leaderboardTimer); });

document.getElementById('topupBtn').addEventListener('click', async ()=>{ await api('/api/topup', {method:'POST', body: JSON.stringify({amount:50})}); await refreshProfile(); toast('Added 50 ARD'); });

document.getElementById('cashoutBtn').addEventListener('click', async ()=>{ const res = await api(`/api/run/cashout/${currentRun.run_id}`, {method:'POST'}); toast(`Reward ${res.reward} ARD`); refreshProfile(); });

document.getElementById('allinBtn').addEventListener('click', async ()=>{ try { const res = await api(`/api/run/allin/${currentRun.run_id}`, {method:'POST'}); currentRun = {...res, mode: currentRun.mode, level: res.level}; events = []; runStartAt = performance.now(); gameEngine.start(res.seed, res.level, currentRun.mode, null, finishRun, recordEvent); showScreen('gameScreen'); } catch(err){ toast('All-in unavailable'); console.error(err);} });

document.getElementById('retryBtn').addEventListener('click', ()=>{ showScreen('modeScreen'); });

document.getElementById('backLobbyBtn').addEventListener('click', ()=>{ showScreen('lobbyScreen'); });

document.getElementById('shareBtn').addEventListener('click', ()=>{ navigator.clipboard.writeText('Sprint Arc – my run felt insane!'); toast('Copied share text'); });

populateLevels();
if (token) {
  refreshProfile().then(()=>{ showScreen('lobbyScreen'); loadTeaser(); loadChampions(); }).catch(()=>localStorage.removeItem('sprint_token'));
}

const levelSelect = document.getElementById('lbLevel');
levelSelect.addEventListener('change', loadLeaderboard);
document.getElementById('lbMode').addEventListener('change', loadLeaderboard);
document.getElementById('lbRange').addEventListener('change', loadLeaderboard);

