<?php

namespace App\Filament\Resources\HddResource\Pages;

use App\Filament\Resources\HddResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHdd extends EditRecord
{
    protected static string $resource = HddResource::class;

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
