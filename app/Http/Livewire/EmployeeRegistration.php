<?php

namespace App\Http\Livewire;

use App\Events\MakeThisUserAsAdmin;
use Filament\Facades\Filament;
use App\Events\MakeThisUserAsEmployee;
use Illuminate\Auth\Events\Registered;
use JeffGreco13\FilamentBreezy\Http\Livewire\Auth\Register as FilamentBreezyRegister;

class EmployeeRegistration extends FilamentBreezyRegister
{
    // Optionally, you can override the entire register() method to customize exactly what happens at registration
    public function register()
    {
        $preparedData = $this->prepareModelData($this->form->getState());

        $user = config('filament-breezy.user_model')::create($preparedData);
        $user->assignRole('Employee');

        event(new Registered($user));
        MakeThisUserAsEmployee::dispatch($user);

        Filament::auth()->login($user, true);

        return redirect()->to('admin');
    }
}