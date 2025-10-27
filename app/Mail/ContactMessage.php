<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $messageBody
    ) {
    }

    /**
     * Build the message.
     */
    public function build(): self
    {
        return $this->subject('New contact message from ' . $this->name)
            ->replyTo($this->email, $this->name)
            ->view('emails.contact');
    }
}
