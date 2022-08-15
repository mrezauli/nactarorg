<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Intake;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ViewIntake extends Component
{
    public Intake $intake;
    public User $user;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function enroll()
    {
        $this->user->intakes()->attach($this->intake);

        session()->flash('flash.banner', 'Enrolled!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect('/list-intakes');
    }

    public function render()
    {
        return view('livewire.view-intake');
    }
}