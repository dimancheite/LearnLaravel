<?php

namespace App\Listeners;

use App\LogUser;
use Illuminate\Auth\Events\Login;

class UserEventSubscriber
{

    /**
     * Handle user login events.
     */
    public function onUserLogin($event) {
        /** @var \App\User $user */
        $user = $event->user;

        $logUser = new LogUser();
        $logUser->user_id = $user->id;
        $logUser->logged_in = now();
        $logUser->save();
    }

    /**
     * Handle user logout events.
     */
    public function onUserLogout($event) {
        /** @var \App\User $user */
        $user = $event->user;

        $logUser = new LogUser();
        $logUser->user_id = $user->id;
        $logUser->logout = now();
        $logUser->save();
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'Illuminate\Auth\Events\Login',
            'App\Listeners\UserEventSubscriber@onUserLogin'
        );

        $events->listen(
            'Illuminate\Auth\Events\Logout',
            'App\Listeners\UserEventSubscriber@onUserLogout'
        );
    }
}
