<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserActivityAlert extends Mailable
{
    use Queueable, SerializesModels;

    public readonly string $fullName;
    public readonly string $emailAddress;
    public readonly string $actionType;

    public function __construct(
        public readonly User $user,
        public readonly string $action,
    ) {
        $this->fullName = (string) ($this->user->name ?? '');
        $this->emailAddress = (string) ($this->user->email ?? '');
        $this->actionType = $this->normalizeActionType($action);
    }

    public function build(): self
    {
        return $this
            ->subject($this->subjectLine())
            ->view('emails.user-activity-alert')
            ->with([
                'fullName' => $this->fullName,
                'emailAddress' => $this->emailAddress,
                'action' => $this->action,
                'description' => $this->description(),
            ]);
    }

    private function subjectLine(): string
    {
        return match ($this->action) {
            'registered' => 'New user registration alert',
            'logged in' => 'User login alert',
            default => 'User activity alert',
        };
    }

    private function description(): string
    {
        return match ($this->action) {
            'registered' => 'registered a new account',
            'logged in' => 'just logged in',
            default => 'performed an activity',
        };
    }

    private function normalizeActionType(string $action): string
    {
        return match ($action) {
            'logged in' => 'logged_in',
            default => $action,
        };
    }
}
