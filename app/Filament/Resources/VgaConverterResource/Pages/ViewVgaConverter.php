<?php

namespace App\Filament\Resources\VgaConverterResource\Pages;

use App\Filament\Resources\VgaConverterResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewVgaConverter extends ViewRecord
{
    protected static string $resource = VgaConverterResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
