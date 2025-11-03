<?php

namespace Tests\Feature;

use App\Mail\UserActivityAlert;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class UserActivityAlertTest extends TestCase
{
    use RefreshDatabase;

    public function test_owner_receives_alert_when_user_registers(): void
    {
        Mail::fake();
        config(['mail.owner_address' => 'owner@example.com']);

        $response = $this->post('/register', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertRedirect('/home');

        Mail::assertSent(UserActivityAlert::class, function (UserActivityAlert $mail) {
            $mail->build();

            return $mail->hasTo('owner@example.com')
                && $mail->actionType === 'registered'
                && $mail->fullName === 'John Doe'
                && $mail->emailAddress === 'john@example.com';
        });
    }

    public function test_owner_receives_alert_when_user_logs_in(): void
    {
        Mail::fake();
        config(['mail.owner_address' => 'owner@example.com']);

        $user = User::factory()->create([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => 'jane@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect('/home');

        Mail::assertSent(UserActivityAlert::class, function (UserActivityAlert $mail) use ($user) {
            $mail->build();

            return $mail->hasTo('owner@example.com')
                && $mail->actionType === 'logged_in'
                && $mail->fullName === $user->name
                && $mail->emailAddress === $user->email;
        });

        Mail::assertSent(UserActivityAlert::class, 1);
    }
}
