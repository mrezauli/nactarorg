<?php

namespace App\Http\Livewire;

use Filament\Forms;
use App\Models\Trainee;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class Attachments extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public Trainee $trainee;

    protected function getFormSchema(): array
    {
        return [
            SpatieMediaLibraryFileUpload::make('photo')
                ->image()
                ->conversion('thumb')
                ->collection('photo')
                ->responsiveImages()
                ->maxFiles(1),
            SpatieMediaLibraryFileUpload::make('signature')
                ->image()
                ->conversion('thumb')
                ->collection('signature')
                ->responsiveImages()
                ->maxFiles(1)
        ];
    }

    public function mount()
    {
        $this->trainee = Trainee::find(Auth::id());
    }

    public function save(): void
    {
        $this->trainee->update(
            $this->form->getState(),
        );

        session()->flash('flash.banner', 'Saved!');
        session()->flash('flash.bannerStyle', 'success');

        redirect('/attachments');
    }

    protected function getFormModel(): Trainee
    {
        return $this->trainee;
    }

    public function render()
    {
        return view('livewire.attachments');
    }
}