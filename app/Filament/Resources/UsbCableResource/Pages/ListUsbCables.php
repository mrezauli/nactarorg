<?php

namespace App\Filament\Resources\UsbCableResource\Pages;

use App\Filament\Resources\UsbCableResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUsbCables extends ListRecords
{
    protected static string $resource = UsbCableResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
