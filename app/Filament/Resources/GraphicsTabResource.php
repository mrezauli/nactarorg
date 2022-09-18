<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\GraphicsTab;
use Illuminate\Support\Str;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TrashedFilter;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\GraphicsTabResource\Pages;
use App\Filament\Resources\GraphicsTabResource\RelationManagers;

class GraphicsTabResource extends Resource
{
    protected static ?string $model = GraphicsTab::class;

    protected static ?string $navigationGroup = 'Computer';

    protected static ?string $navigationIcon = 'heroicon-o-device-tablet';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Hidden::make('slug')
                    ->default(Str::uuid()),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('brand')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('model')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('sale')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('sku')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('number')
                    ->required(),
                Forms\Components\DatePicker::make('warranty')
                    ->required(),
                Select::make('laboratoryId')
                    ->required()
                    ->relationship('laboratory', 'number')
                    ->createOptionForm([
                        Hidden::make('slug')
                            ->default(Str::uuid()),
                        Forms\Components\TextInput::make('number')
                            ->required(),
                        Forms\Components\Toggle::make('isTheory')
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('brand'),
                Tables\Columns\TextColumn::make('model'),
                Tables\Columns\TextColumn::make('sale'),
                Tables\Columns\TextColumn::make('sku'),
                Tables\Columns\TextColumn::make('number'),
                Tables\Columns\TextColumn::make('warranty')
                    ->date(),
                Tables\Columns\TextColumn::make('laboratory.number'),
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
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGraphicsTabs::route('/'),
            'create' => Pages\CreateGraphicsTab::route('/create'),
            'view' => Pages\ViewGraphicsTab::route('/{record}'),
            'edit' => Pages\EditGraphicsTab::route('/{record}/edit'),
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