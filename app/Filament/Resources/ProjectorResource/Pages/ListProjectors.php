<?php

namespace App\Filament\Resources\ProjectorResource\Pages;

use App\Filament\Resources\ProjectorResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProjectors extends ListRecords
{
    protected static string $resource = ProjectorResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
