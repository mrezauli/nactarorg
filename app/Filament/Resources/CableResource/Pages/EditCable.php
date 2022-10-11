<?php

namespace App\Filament\Resources\CableResource\Pages;

use App\Filament\Resources\CableResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCable extends EditRecord
{
    protected static string $resource = CableResource::class;

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
