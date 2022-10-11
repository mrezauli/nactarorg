<?php

namespace App\Http\Livewire;

use App\Models\Trainee;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdditionalInfo extends Component
{
    public $trainee;

    public function mount()
    {
        $this->trainee = Trainee::find(Auth::id());
    }

    protected $rules = [
        'trainee.name_in_bangla' => 'required|string|max:50',
        'trainee.name_of_father' => 'required|string|max:50',
        'trainee.name_of_father_in_bangla' => 'required|string|max:50',
        'trainee.name_of_mother' => 'required|string|max:50',
        'trainee.name_of_mother_in_bangla' => 'required|string|max:50',
        'trainee.date_of_birth' => 'required|date',
        'trainee.national_id' => 'required|integer|max:19',
    ];

    public function save()
    {
        $this->validate();

        $this->trainee->save();

        session()->flash('flash.banner', 'Saved!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect('/additional-info');
    }

    public function render()
    {
        return view('livewire.additional-info');
    }
}