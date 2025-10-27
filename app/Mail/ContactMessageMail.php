<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;

    // Accept the validated data from the controller
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function build()
    {
        // Set the email subject and tell Laravel to render the Markdown view
        return $this->subject('New contact message')
                    ->markdown('emails.contact'); // resources/views/emails/contact.blade.php
    }
}
