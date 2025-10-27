<?php

namespace Tests\Feature\Auth;

use App\Mail\UserActivityAlert;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class UserActivityNotificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_owner_is_notified_when_user_registers(): void
    {
        Mail::fake();
        Config::set('mail.owner_address', 'owner@example.com');

        $response = $this->post(route('register'), [
            'name' => 'Dulguun Bayar',
            'email' => 'dulguun@example.com',
            'password' => 'secretpass',
            'password_confirmation' => 'secretpass',
        ]);

        $response->assertRedirect(route('account.edit'));
        $this->assertAuthenticated();

        Mail::assertSent(UserActivityAlert::class, function (UserActivityAlert $mail) {
            return $mail->hasTo('owner@example.com')
                && $mail->action === 'registered'
                && $mail->user->email === 'dulguun@example.com';
        });
    }

    public function test_owner_is_notified_when_user_logs_in(): void
    {
        Mail::fake();
        Config::set('mail.owner_address', 'owner@example.com');

        $user = User::factory()->create();

        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertRedirect(route('account.edit'));
        $this->assertAuthenticatedAs($user);

        Mail::assertSent(UserActivityAlert::class, function (UserActivityAlert $mail) use ($user) {
            return $mail->hasTo('owner@example.com')
                && $mail->action === 'logged in'
                && $mail->user->is($user);
        });
    }
}
