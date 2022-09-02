<?php

namespace App\Filament\Resources\TraineeResource\Pages;

use App\Filament\Resources\TraineeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTrainee extends ViewRecord
{
    protected static string $resource = TraineeResource::class;

    protected function getActions(): array
    {
        return [
        ];
    }
}