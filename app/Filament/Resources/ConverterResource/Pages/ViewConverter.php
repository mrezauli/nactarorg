<?php

namespace App\Filament\Resources\ConverterResource\Pages;

use App\Filament\Resources\ConverterResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewConverter extends ViewRecord
{
    protected static string $resource = ConverterResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
