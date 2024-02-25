<?php

namespace App\Providers;

use App\crm\customer\Events\customerCreation;
use App\crm\customer\Listeners\notifySalesOnCustomerCreation;
use App\crm\customer\Listeners\sendWelcomeEmail ;
use App\crm\project\event\projectCreation;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        customerCreation::class =>[
            notifySalesOnCustomerCreation::class,
        ],
        projectCreation::class=>[//when even this event open
            sendWelcomeEmail::class ///this listener
        ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
