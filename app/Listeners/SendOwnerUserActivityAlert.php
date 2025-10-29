<?php

namespace App\Listeners;

use App\Mail\UserActivityAlert;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Mail;

class SendOwnerUserActivityAlert
{
    public function handle(Login|Registered $event): void
    {
        $user = $event->user;
        $action = $event instanceof Registered ? 'registered' : 'logged_in';

        $this->notifyOwner($user, $action);
    }

    private function notifyOwner(?Authenticatable $user, string $action): void
    {
        $ownerAddress = config('mail.owner_address');

        if ($ownerAddress === '') {
            return;
        }

        $user = $event->user;
        $action = $event instanceof Registered ? 'registered' : 'logged_in';

        Mail::to($ownerAddress)->send(
            new UserActivityAlert(
                fullName: $user?->name ?? '',
                emailAddress: $user?->email ?? '',
                actionType: $action,
            )
        );
    }
}
