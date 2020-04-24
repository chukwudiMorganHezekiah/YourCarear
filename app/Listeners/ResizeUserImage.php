<?php

namespace App\Listeners;

use App\Events\UserUpdatedProfileImageEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Intervention\Image\Facades\Image;

class ResizeUserImage implements ShouldQueue
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
     * @param  UserUpdatedProfileImageEvent  $event
     * @return void
     */
    public function handle(UserUpdatedProfileImageEvent $event)
    {
        //
        $image=Image::make(public_path('/storage/profile_images/'.$event->data))->fit(250,250);
        $saved=$image->save();
        
    }
}
