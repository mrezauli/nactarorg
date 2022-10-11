<?php

namespace App\Filament\Resources\ConverterResource\Pages;

use App\Filament\Resources\ConverterResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConverter extends EditRecord
{
    protected static string $resource = ConverterResource::class;

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
