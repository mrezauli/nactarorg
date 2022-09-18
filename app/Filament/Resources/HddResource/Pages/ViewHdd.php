<?php

namespace App\Filament\Resources\HddResource\Pages;

use App\Filament\Resources\HddResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewHdd extends ViewRecord
{
    protected static string $resource = HddResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
