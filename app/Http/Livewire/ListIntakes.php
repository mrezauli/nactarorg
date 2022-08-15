<?php

namespace App\Http\Livewire;

use App\Models\Intake;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListIntakes extends Component
{
    public $intakes;

    public function render()
    {
        $intakes = Intake::all();
        $intakesOfUser = Auth::user()->intakes;
        $this->intakes = $intakes->diff($intakesOfUser);

        return view('livewire.list-intakes');
    }
}