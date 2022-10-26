<?php

namespace App\Http\Livewire;

use Filament\Forms;
use App\Models\Trainee;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;

class Address extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public Trainee $trainee;

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('addressee')
                ->rules(['required', 'string', 'max:30']),
            TextInput::make('address')
                ->rules(['required', 'string', 'max:100']),
            TextInput::make('name_of_police_station')
                ->rules(['required', 'string', 'max:20']),
            TextInput::make('name_of_post_office')
                ->rules(['required', 'integer', 'max:20']),
            TextInput::make('post_code')
                ->numeric()
                ->rules(['required', 'integer']),
            TextInput::make('ward')
                ->numeric()
                ->rules(['required', 'integer']),
            TextInput::make('name_of_union')
                ->rules(['required', 'integer', 'max:20']),
            TextInput::make('name_of_development_circle')
                ->rules(['required', 'integer', 'max:20']),
            TextInput::make('name_of_upazilla')
                ->rules(['required', 'integer', 'max:20']),
            TextInput::make('name_of_district')
                ->rules(['required', 'integer', 'max:20']),
            TextInput::make('name_of_country')
                ->rules(['required', 'integer', 'max:20']),
        ];
    }

    public function mount()
    {
        $this->trainee = Trainee::find(Auth::id());
        $this->form->fill([
            'name_in_bangla' => $this->trainee->name_in_bangla,
        ]);
    }

    public function save(): void
    {
        $this->trainee->update(
            $this->form->getState(),
        );

        session()->flash('flash.banner', 'Saved!');
        session()->flash('flash.bannerStyle', 'success');

        redirect('/address');
    }

    protected function getFormModel(): Trainee
    {
        return $this->trainee;
    }


    public function render()
    {
        return view('livewire.address');
    }
}