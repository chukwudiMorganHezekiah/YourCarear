<?php

namespace App\Listeners;

use App\Events\newCompanyCreatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendCompanyANewCompanyCreatedEmailListener //implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  newCompanyCreatedEvent  $event
     * @return void
     */
    public function handle(newCompanyCreatedEvent $event)
    {
        //
       // $user=\App\User::find($event->data->user_id)->first();

       // Mail::to($user->email)->send(new \App\Mail\newCompanyCreatedEvent($user));
    }
}
