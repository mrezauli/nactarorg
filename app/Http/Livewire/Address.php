<?php

namespace App\Http\Livewire;

use Filament\Forms;
use App\Models\Trainee;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\TextInput;

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
                ->rules(['required', 'string', 'max:20']),
            TextInput::make('post_code')
                ->numeric()
                ->rules(['required', 'integer']),
            TextInput::make('ward_number')
                ->numeric()
                ->rules(['required', 'integer']),
            TextInput::make('name_of_union')
                ->rules(['required', 'string', 'max:20']),
            TextInput::make('name_of_development_circle')
                ->rules(['required', 'string', 'max:20']),
            TextInput::make('name_of_upazilla')
                ->rules(['required', 'string', 'max:20']),
            TextInput::make('name_of_district')
                ->rules(['required', 'string', 'max:20']),
            TextInput::make('name_of_country')
                ->rules(['required', 'string', 'max:20'])
        ];
    }

    public function mount()
    {
        $this->trainee = Trainee::find(Auth::id());
        $this->form->fill([
            'addressee' => $this->trainee->addressee,
            'address' => $this->trainee->address,
            'name_of_police_station' => $this->trainee->name_of_police_station,
            'name_of_post_office' => $this->trainee->name_of_post_office,
            'post_code' => $this->trainee->post_code,
            'ward_number' => $this->trainee->ward_number,
            'name_of_union' => $this->trainee->name_of_union,
            'name_of_development_circle' => $this->trainee->name_of_development_circle,
            'name_of_upazilla' => $this->trainee->name_of_upazilla,
            'name_of_district' => $this->trainee->name_of_district,
            'name_of_country' => $this->trainee->name_of_country,
        ]);
    }

    public function save(): void
    {
        //dd($this->form->getState());
        $this->trainee->update(
            $this->form->getState()
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
