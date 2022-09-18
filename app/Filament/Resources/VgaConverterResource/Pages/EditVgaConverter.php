<?php

namespace App\Filament\Resources\VgaConverterResource\Pages;

use App\Filament\Resources\VgaConverterResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVgaConverter extends EditRecord
{
    protected static string $resource = VgaConverterResource::class;

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
