<?php

namespace App\Filament\Resources\ReligionResource\Pages;

use App\Filament\Resources\ReligionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewReligion extends ViewRecord
{
    protected static string $resource = ReligionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
