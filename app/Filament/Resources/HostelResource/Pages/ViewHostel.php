<?php

namespace App\Filament\Resources\HostelResource\Pages;

use App\Filament\Resources\HostelResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewHostel extends ViewRecord
{
    protected static string $resource = HostelResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
