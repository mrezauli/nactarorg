<?php

namespace App\Filament\Resources\UsbCableResource\Pages;

use App\Filament\Resources\UsbCableResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewUsbCable extends ViewRecord
{
    protected static string $resource = UsbCableResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
