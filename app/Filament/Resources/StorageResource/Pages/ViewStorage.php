<?php

namespace App\Filament\Resources\StorageResource\Pages;

use App\Filament\Resources\StorageResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewStorage extends ViewRecord
{
    protected static string $resource = StorageResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
