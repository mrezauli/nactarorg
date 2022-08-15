<?php

namespace App\Providers;

use App\Events\MakeThisUserAsAdmin;
use App\Events\MakeThisUserAsEmployee;
use App\Events\MakeThisUserAsTrainee;
use App\Listeners\MakingOfAdmin;
use App\Listeners\MakingOfEmployee;
use App\Listeners\MakingOfTrainee;
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
        MakeThisUserAsTrainee::class => [
            MakingOfTrainee::class,
        ],
        MakeThisUserAsAdmin::class => [
            MakingOfAdmin::class,
        ],
        MakeThisUserAsEmployee::class => [
            MakingOfEmployee::class,
        ]
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