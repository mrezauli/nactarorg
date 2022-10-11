<?php

namespace App\Filament\Resources\QuotaResource\Pages;

use App\Filament\Resources\QuotaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListQuotas extends ListRecords
{
    protected static string $resource = QuotaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
