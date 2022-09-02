<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Intake;
use Livewire\Component;

class EnrolledIntake extends Component
{
    public Intake $intake;
    public User $user;

    public function render()
    {
        return view('livewire.enrolled-intake');
    }
}
