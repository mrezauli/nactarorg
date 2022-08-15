<?php

namespace App\Listeners;

use App\Events\MakeThisUserAsEmployee;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MakingOfEmployee
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
     * @param  \App\Events\=MakeThisUserAsEmployee  $event
     * @return void
     */
    public function handle(MakeThisUserAsEmployee $event)
    {
        $event->user->update(['type' => 'App\Models\Employee']);

        return null;
    }
}