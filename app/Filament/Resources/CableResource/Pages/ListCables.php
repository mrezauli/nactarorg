<?php

namespace App\Filament\Resources\CableResource\Pages;

use App\Filament\Resources\CableResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCables extends ListRecords
{
    protected static string $resource = CableResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
