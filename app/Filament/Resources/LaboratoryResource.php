<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Laboratory;
use Illuminate\Support\Str;
use App\Models\VgaConverter;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LaboratoryResource\Pages;
use Filament\Resources\RelationManagers\RelationGroup;
use App\Filament\Resources\LaboratoryResource\RelationManagers\HddsRelationManager;
use App\Filament\Resources\LaboratoryResource\RelationManagers\EmployeeRelationManager;
use App\Filament\Resources\LaboratoryResource\RelationManagers\PrintersRelationManager;
use App\Filament\Resources\LaboratoryResource\RelationManagers\ComputersRelationManager;
use App\Filament\Resources\LaboratoryResource\RelationManagers\UsbcablesRelationManager;
use App\Filament\Resources\LaboratoryResource\RelationManagers\ProjectorsRelationManager;
use App\Filament\Resources\LaboratoryResource\RelationManagers\AccessoriesRelationManager;
use App\Filament\Resources\LaboratoryResource\RelationManagers\GraphicstabsRelationManager;
use App\Filament\Resources\LaboratoryResource\RelationManagers\VgaconvertersRelationManager;

class LaboratoryResource extends Resource
{
    protected static ?string $model = Laboratory::class;

    protected static ?string $navigationGroup = 'Computer';

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
            EmployeeRelationManager::class,
            RelationGroup::make('Devices', [
                ComputersRelationManager::class,
                GraphicstabsRelationManager::class,
                HddsRelationManager::class,
                PrintersRelationManager::class,
                ProjectorsRelationManager::class,
                UsbcablesRelationManager::class,
                VgaconvertersRelationManager::class,
            ]),
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