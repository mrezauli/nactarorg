<?php

namespace App\Filament\Resources\ProjectorResource\Pages;

use App\Filament\Resources\ProjectorResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProjector extends EditRecord
{
    protected static string $resource = ProjectorResource::class;

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
