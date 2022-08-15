<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ListIntakesOfUser extends Component
{
    public $intakes;

    public function render()
    {
        $this->intakes = Auth::user()->intakes;
        return view('livewire.list-intakes-of-user');
    }
}