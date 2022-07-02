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

class AccessoriesRelationManager extends RelationManager
{
    protected static string $relationship = 'accessories';

    protected static ?string $recordTitleAttribute = 'id';

    protected static ?string $inverseRelationship = 'laboratory';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Hidden::make('slug')
                    ->default(Str::uuid()),
                Forms\Components\TextInput::make('nos_of_printer')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('nos_of_projector')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('nos_of_usb_cable')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('nos_of_hdd')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('nos_of_vga_converter')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('nos_of_graphics_tab')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('laboratory.number'),
                Tables\Columns\TextColumn::make('nos_of_printer'),
                Tables\Columns\TextColumn::make('nos_of_projector'),
                Tables\Columns\TextColumn::make('nos_of_usb_cable'),
                Tables\Columns\TextColumn::make('nos_of_hdd'),
                Tables\Columns\TextColumn::make('nos_of_vga_converter'),
                Tables\Columns\TextColumn::make('nos_of_graphics_tab'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make()
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
                Tables\Actions\AssociateAction::make(),
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