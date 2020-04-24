<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \App\Events\NewUserCreatedEvent::class => [
            \App\Listeners\SaveUsersDataListener::class,
        ],
        \App\Events\UserUpdatedProfileImageEvent::class => [
            \App\Listeners\ResizeUserImage::class,
        ],
        \App\Events\newCompanyCreatedEvent::class => [
            \App\Listeners\SendCompanyANewCompanyCreatedEmailListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
