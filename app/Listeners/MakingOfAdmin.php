<?php

namespace App\Listeners;

use App\Events\MakeThisUserAsAdmin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MakingOfAdmin
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
     * @param  \App\Events\=MakeThisUserAsAdmin  $event
     * @return void
     */
    public function handle(MakeThisUserAsAdmin $event)
    {
        $event->user->update(['type' => 'App\Models\Admin']);

        return null;
    }
}