<?php

namespace Tests\Feature;

use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    public function test_contact_form_sends_email(): void
    {
        Mail::fake();

        config(['mail.owner_address' => 'owner@example.com']);

        $response = $this->from(route('contact'))->post(route('contact.send'), [
            'name' => 'Test User',
            'email' => 'user@example.com',
            'message' => 'Hello there, this is a test message.',
        ]);

        $response->assertRedirect(route('contact'));
        $response->assertSessionHas('status');

        Mail::assertSent(ContactMessage::class, function (ContactMessage $mail) {
            return $mail->hasTo('owner@example.com')
                && $mail->name === 'Test User'
                && $mail->email === 'user@example.com'
                && $mail->messageBody === 'Hello there, this is a test message.';
        });
    }
}
