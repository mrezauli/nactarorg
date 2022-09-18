<?php

namespace App\Filament\Resources\VgaConverterResource\Pages;

use App\Filament\Resources\VgaConverterResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVgaConverters extends ListRecords
{
    protected static string $resource = VgaConverterResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
