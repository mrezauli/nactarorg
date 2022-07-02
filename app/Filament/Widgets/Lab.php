<?php

namespace App\Filament\Widgets;

use Closure;
use Filament\Tables;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Builder;
use Filament\Widgets\TableWidget as BaseWidget;

class Lab extends BaseWidget
{
    protected function getTableQuery(): Builder
    {
        return Employee::query()->latest()->limit(10);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('name'),
            Tables\Columns\TextColumn::make('designation')
        ];
    }

    public static function canView(): bool
    {
        return false;
    }
}