<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Laboratory;
use Illuminate\Support\Str;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LaboratoryResource\Pages;
use App\Filament\Resources\LaboratoryResource\RelationManagers;
use App\Filament\Resources\LaboratoryResource\Pages\EditLaboratory;
use App\Filament\Resources\LaboratoryResource\Pages\ViewLaboratory;
use App\Filament\Resources\LaboratoryResource\Pages\CreateLaboratory;
use App\Filament\Resources\LaboratoryResource\Pages\ListLaboratories;
use App\Filament\Resources\LaboratoryResource\RelationManagers\EmployeeRelationManager;
use App\Filament\Resources\LaboratoryResource\RelationManagers\ComputersRelationManager;
use App\Filament\Resources\LaboratoryResource\RelationManagers\AccessoriesRelationManager;

class LaboratoryResource extends Resource
{
    protected static ?string $model = Laboratory::class;

    protected static ?string $navigationIcon = 'heroicon-o-terminal';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Hidden::make('slug')
                    ->default(Str::uuid()),
                Forms\Components\TextInput::make('number')
                    ->numeric()
                    ->required(),
                Forms\Components\Toggle::make('isTheory')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('number'),
                Tables\Columns\BooleanColumn::make('isTheory'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
            ComputersRelationManager::class,
            AccessoriesRelationManager::class,
            EmployeeRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLaboratories::route('/'),
            'create' => Pages\CreateLaboratory::route('/create'),
            'view' => Pages\ViewLaboratory::route('/{record}'),
            'edit' => Pages\EditLaboratory::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}