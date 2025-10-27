<?php

namespace App\Listeners;

use App\Mail\UserActivityAlert;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Mail;

class SendUserLoginAlert
{
    public function handle(Login $event): void
    {
        $ownerAddress = config('mail.owner_address');

        if (! $ownerAddress) {
            return;
        }

        $user = $event->user;

        Mail::to($ownerAddress)->queue(
            new UserActivityAlert(
                fullName: $user?->name ?? '',
                emailAddress: $user?->email ?? '',
                actionType: 'logged_in',
            )
        );
    }
}
