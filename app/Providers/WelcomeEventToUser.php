<?php

namespace App\Providers;

use App\Mail\Email;
use App\Models\User;
use App\Providers\WelcomeEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class WelcomeEventToUser
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(WelcomeEvent $event): void
    {
        //dd($event->user->id);
        User::find($event->user->id)->update(['status'=>1]);
        //Mail::to($event->user->email)->send(new Email($event->user));
    }
}
