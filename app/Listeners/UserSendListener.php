<?php

namespace App\Listeners;

use App\Events\UserSendEvent;
use App\Mail\subscriptionMail;
use App\Models\Subscription;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class UserSendListener
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
     * @param  object  $event
     * @return void
     */
    public function handle(UserSendEvent $event)
    {
        Subscription::insert([
            'email'=>$event->email,
        ]);
        Mail::to($event->email)->send(new subscriptionMail);
    }
}
