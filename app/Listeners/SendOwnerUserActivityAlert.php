<?php

namespace App\Listeners;

use App\Mail\UserActivityAlert;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;

class SendOwnerUserActivityAlert
{
    public function handle(Login|Registered $event): void
    {
        $this->notifyOwner($event);
    }

    private function notifyOwner(Login|Registered $event): void
    {
        $ownerAddress = config('mail.owner_address');

        if (empty($ownerAddress)) {
            return;
        }

        $user = $event->user;
        $action = $event instanceof Registered ? 'registered' : 'logged_in';

        Mail::to($ownerAddress)->queue(
            new UserActivityAlert(
                fullName: $user?->name ?? '',
                emailAddress: $user?->email ?? '',
                actionType: $action,
            )
        );
    }
}
