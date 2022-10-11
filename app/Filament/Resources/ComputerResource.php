<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Computer;
use Illuminate\Support\Str;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Hidden;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ComputerResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ComputerResource\RelationManagers;
use Filament\Forms\Components\Select;

class ComputerResource extends Resource
{
    protected static ?string $model = Computer::class;

    protected static ?string $navigationGroup = 'Computer';

    protected static ?string $navigationIcon = 'heroicon-o-desktop-computer';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
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
                Forms\Components\TextInput::make('sku')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('cpu')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('ram')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('storage')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('sale')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('number')
                    ->required(),
                Forms\Components\DatePicker::make('warranty')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('laboratory.number'),
                Tables\Columns\TextColumn::make('brand'),
                Tables\Columns\TextColumn::make('model'),
                Tables\Columns\TextColumn::make('cpu'),
                Tables\Columns\TextColumn::make('ram'),
                Tables\Columns\TextColumn::make('storage'),
                Tables\Columns\TextColumn::make('sale'),
                Tables\Columns\TextColumn::make('number'),
                Tables\Columns\TextColumn::make('warranty')
                    ->date(),
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
            'index' => Pages\ListComputers::route('/'),
            'create' => Pages\CreateComputer::route('/create'),
            'view' => Pages\ViewComputer::route('/{record}'),
            'edit' => Pages\EditComputer::route('/{record}/edit'),
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
