<?php

namespace App\Filament\Resources\DigitizerResource\Pages;

use App\Filament\Resources\DigitizerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDigitizers extends ListRecords
{
    protected static string $resource = DigitizerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
