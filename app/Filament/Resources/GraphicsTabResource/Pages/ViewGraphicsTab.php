<?php

namespace App\Filament\Resources\GraphicsTabResource\Pages;

use App\Filament\Resources\GraphicsTabResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewGraphicsTab extends ViewRecord
{
    protected static string $resource = GraphicsTabResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
