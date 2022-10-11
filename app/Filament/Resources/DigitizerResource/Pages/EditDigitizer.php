<?php

namespace App\Filament\Resources\DigitizerResource\Pages;

use App\Filament\Resources\DigitizerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDigitizer extends EditRecord
{
    protected static string $resource = DigitizerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
