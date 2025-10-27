<?php

namespace App\Providers;

use App\Listeners\SendUserLoginAlert;
use App\Listeners\SendUserRegisteredAlert;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendUserRegisteredAlert::class,
        ],
        Login::class => [
            SendUserLoginAlert::class,
        ],
    ];
}
