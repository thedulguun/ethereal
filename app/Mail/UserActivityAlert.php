<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserActivityAlert extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public User $user, public string $action)
    {
    }

    public function build(): self
    {
        return $this->subject(match ($this->action) {
                'registered' => 'New user registration',
                'logged in' => 'User login alert',
                default => 'User activity alert',
            })
            ->view('emails.user-activity', [
                'user' => $this->user,
                'action' => $this->action,
            ]);
    }
}
