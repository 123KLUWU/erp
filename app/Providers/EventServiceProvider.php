<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\InventarioAjuste;
use App\Events\InventarioEntrada;
use App\Events\InventarioSalida;
use App\Listeners\RegistrarInventarioAjuste;
use App\Listeners\RegistrarInventarioEntrada;
use App\Listeners\RegistrarInventarioSalida;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        InventarioEntrada::class => [
            RegistrarInventarioEntrada::class,
        ],
        InventarioSalida::class => [
            RegistrarInventarioSalida::class,
        ],
        InventarioAjuste::class => [
            RegistrarInventarioAjuste::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}