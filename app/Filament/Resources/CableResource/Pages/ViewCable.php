<?php

namespace App\Filament\Resources\CableResource\Pages;

use App\Filament\Resources\CableResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCable extends ViewRecord
{
    protected static string $resource = CableResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
