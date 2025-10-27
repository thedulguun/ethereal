<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserActivityAlert extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(
        public readonly string $fullName,
        public readonly string $emailAddress,
        public readonly string $actionType,
    ) {
    }

    public function build(): self
    {
        return $this
            ->subject($this->subjectLine())
            ->view('emails.user-activity-alert')
            ->with([
                'fullName' => $this->fullName,
                'emailAddress' => $this->emailAddress,
                'actionType' => $this->actionType,
                'description' => $this->description(),
            ]);
    }

    private function subjectLine(): string
    {
        return match ($this->actionType) {
            'registered' => 'New user registration alert',
            'logged_in' => 'User login alert',
            default => 'User activity alert',
        };
    }

    private function description(): string
    {
        return match ($this->actionType) {
            'registered' => 'registered a new account',
            'logged_in' => 'just logged in',
            default => 'performed an activity',
        };
    }
}
