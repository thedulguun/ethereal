<?php

namespace App\Listeners;

use App\Mail\UserActivityAlert;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;

class SendOwnerUserActivityAlert
{
    public function handle(Login|Registered $event): void
    {
        $ownerAddress = (string) config('mail.owner_address');

        if ($ownerAddress === '') {
            return;
        }

        $user = $event->user;

        if (! $user instanceof User) {
            return;
        }

        $action = $event instanceof Registered ? 'registered' : 'logged in';

        Mail::to($ownerAddress)->send(new UserActivityAlert($user, $action));
    }
}
