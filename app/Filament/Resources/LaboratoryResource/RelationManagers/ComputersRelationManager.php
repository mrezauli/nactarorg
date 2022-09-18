<?php

namespace App\Filament\Resources\LaboratoryResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Illuminate\Support\Str;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Forms\Components\Hidden;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class ComputersRelationManager extends RelationManager
{
    protected static string $relationship = 'computers';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $inverseRelationship = 'laboratory';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
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
                Forms\Components\TextInput::make('cpu')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('ram')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('hdd')
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
                //
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('laboratory.number'),
                Tables\Columns\TextColumn::make('brand'),
                Tables\Columns\TextColumn::make('model'),
                Tables\Columns\TextColumn::make('cpu'),
                Tables\Columns\TextColumn::make('ram'),
                Tables\Columns\TextColumn::make('hdd'),
                Tables\Columns\TextColumn::make('sale'),
                Tables\Columns\TextColumn::make('number'),
                Tables\Columns\TextColumn::make('warranty')
                    ->date(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make()
            ])
            ->headerActions([
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DissociateAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DissociateBulkAction::make(),
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
            ]);
    }

    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}