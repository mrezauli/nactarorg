<?php

namespace App\Filament\Resources\HddResource\Pages;

use App\Filament\Resources\HddResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHdds extends ListRecords
{
    protected static string $resource = HddResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
