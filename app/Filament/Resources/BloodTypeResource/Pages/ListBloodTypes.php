<?php

namespace App\Filament\Resources\BloodTypeResource\Pages;

use App\Filament\Resources\BloodTypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBloodTypes extends ListRecords
{
    protected static string $resource = BloodTypeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
