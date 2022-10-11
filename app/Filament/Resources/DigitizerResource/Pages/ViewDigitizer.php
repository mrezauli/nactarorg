<?php

namespace App\Filament\Resources\DigitizerResource\Pages;

use App\Filament\Resources\DigitizerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewDigitizer extends ViewRecord
{
    protected static string $resource = DigitizerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
