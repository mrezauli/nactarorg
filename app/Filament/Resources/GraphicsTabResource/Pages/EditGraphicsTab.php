<?php

namespace App\Filament\Resources\GraphicsTabResource\Pages;

use App\Filament\Resources\GraphicsTabResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGraphicsTab extends EditRecord
{
    protected static string $resource = GraphicsTabResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
