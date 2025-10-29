<?php

namespace App\Providers;

use App\Listeners\SendOwnerUserActivityAlert;
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
            SendOwnerUserActivityAlert::class,
        ],
        Login::class => [
            SendOwnerUserActivityAlert::class,
        ],
    ];
}
