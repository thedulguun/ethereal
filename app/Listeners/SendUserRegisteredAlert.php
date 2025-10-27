<?php

namespace App\Listeners;

use App\Mail\UserActivityAlert;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;

class SendUserRegisteredAlert
{
    public function handle(Registered $event): void
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
                actionType: 'registered',
            )
        );
    }
}
