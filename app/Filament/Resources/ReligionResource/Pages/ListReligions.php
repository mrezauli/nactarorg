<?php

namespace App\Filament\Resources\ReligionResource\Pages;

use App\Filament\Resources\ReligionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReligions extends ListRecords
{
    protected static string $resource = ReligionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
