<?php

namespace App\Filament\Resources\UsbCableResource\Pages;

use App\Filament\Resources\UsbCableResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUsbCable extends EditRecord
{
    protected static string $resource = UsbCableResource::class;

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
