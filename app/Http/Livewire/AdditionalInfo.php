<?php

namespace App\Http\Livewire;

use Filament\Forms;
use App\Models\Trainee;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;

class AdditionalInfo extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public Trainee $trainee;

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('name_in_bangla')
                ->rules(['required', 'string', 'max:50']),
            TextInput::make('name_of_father')
                ->rules(['required', 'string', 'max:50']),
            TextInput::make('name_of_father_in_bangla')
                ->rules(['required', 'string', 'max:50']),
            TextInput::make('name_of_mother')
                ->rules(['required', 'string', 'max:50']),
            TextInput::make('name_of_mother_in_bangla')
                ->rules(['required', 'string', 'max:50']),
            DatePicker::make('date_of_birth')
                ->displayFormat('Y-m-d')
                ->rules(['required', 'date']),
            Select::make('genderId')
                ->relationship('gender', 'name'),
            Select::make('religionId')
                ->relationship('religion', 'name'),
            Select::make('bloodTypeId')
                ->relationship('bloodtype', 'name'),
            TextInput::make('national_id')
                ->numeric()
                ->rules(['required', 'integer']),
            TextInput::make('contact')
                ->numeric()
                ->rules(['required', 'integer']),
            Select::make('quotaId')
                ->relationship('quota', 'name')
        ];
    }

    public function mount()
    {
        $this->trainee = Trainee::find(Auth::id());
        $this->form->fill([
            'name_in_bangla' => $this->trainee->name_in_bangla,
            'name_of_father' => $this->trainee->name_of_father,
            'name_of_father_in_bangla' => $this->trainee->name_of_father_in_bangla,
            'name_of_mother' => $this->trainee->name_of_mother,
            'name_of_mother_in_bangla' => $this->trainee->name_of_mother_in_bangla,
            'date_of_birth' => $this->trainee->date_of_birth,
            'national_id' => $this->trainee->national_id,
            'contact' => $this->trainee->contact,
            'blood_type_id' => $this->trainee->blood_type_id,
            'gender_id' => $this->trainee->gender_id,
            'quota_id' => $this->trainee->quota_id,
            'religion_id' => $this->trainee->religion_id,
        ]);
    }

    public function save(): void
    {
        $this->trainee->update(
            $this->form->getState(),
        );

        session()->flash('flash.banner', 'Saved!');
        session()->flash('flash.bannerStyle', 'success');

        redirect('/additional-info');
    }

    protected function getFormModel(): Trainee
    {
        return $this->trainee;
    }

    public function render()
    {
        return view('livewire.additional-info');
    }
}