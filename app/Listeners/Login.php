<?php

namespace App\Listeners;

use DateTime;
use Illuminate\Auth\Events\Login as UserLogin;
use Illuminate\Support\Facades\Log;

class Login
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
     * @param UserLogin $event
     * @return void
     */
    public function handle(UserLogin $event)
    {

        $now = new DateTime();

        // Save user login time
        $event->user->last_logged_in_at = $now->format('Y-m-d H:i:s');
        $event->user->save();
    }
}
