<?php

namespace App\Filament\Resources\ConverterResource\Pages;

use App\Filament\Resources\ConverterResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListConverters extends ListRecords
{
    protected static string $resource = ConverterResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
