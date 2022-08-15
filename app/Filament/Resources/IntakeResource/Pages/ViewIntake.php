<?php

namespace App\Filament\Resources\IntakeResource\Pages;

use App\Filament\Resources\IntakeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewIntake extends ViewRecord
{
    protected static string $resource = IntakeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
