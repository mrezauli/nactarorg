<?php

namespace App\Filament\Widgets;

use App\Models\Computer;
use App\Models\Employee;
use App\Models\Accessory;
use App\Models\Laboratory;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class ComputerStat extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            //
            Card::make('Accessories', Accessory::count())
                ->description('Total')
                ->descriptionIcon('heroicon-s-trending-up')
                ->color('success'),
                Card::make('Computers', Computer::count())
                ->description('Total')
                ->descriptionIcon('heroicon-s-trending-up')
                ->color('success'),
                Card::make('Employees', Employee::count())
                ->description('Total')
                ->descriptionIcon('heroicon-s-trending-up')
                ->color('success'),
                Card::make('Labs', Laboratory::count())
                ->description('Total')
                ->descriptionIcon('heroicon-s-trending-up')
                ->color('success'),
        ];
    }
    
    
}