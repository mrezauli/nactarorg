<?php

namespace App\Listeners;

use App\Events\MakeThisUserAsTrainee;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MakingOfTrainee
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
     * @param  \App\Events\=MakeThisUserAsTrainee  $event
     * @return void
     */
    public function handle(MakeThisUserAsTrainee $event)
    {
        $event->user->update(['type' => 'App\Models\Trainee']);

        return null;
    }
}
