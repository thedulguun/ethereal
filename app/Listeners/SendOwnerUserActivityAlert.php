<?php

namespace App\Listeners;

use App\Mail\UserActivityAlert;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Mail;

class SendOwnerUserActivityAlert
{
    public function handle(Login|Registered $event): void
    {
        $user = $event->user;
        $action = $event instanceof Registered ? 'registered' : 'logged in';

        $this->notifyOwner($user, $action);
    }

    private function notifyOwner(?Authenticatable $user, string $action): void
    {
        $ownerAddress = config('mail.owner_address');

        if (empty($ownerAddress)) {
            return;
        }

        Mail::to($ownerAddress)->send(
            new UserActivityAlert(
                user: $user,
                action: $action,
            )
        );
    }
}
