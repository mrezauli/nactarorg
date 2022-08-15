<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Accessory;
use Illuminate\Support\Str;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Forms\Components\BelongsToSelect;
use App\Filament\Resources\AccessoryResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AccessoryResource\RelationManagers;

class AccessoryResource extends Resource
{
    protected static ?string $model = Accessory::class;

    protected static ?string $navigationGroup = 'Computer';

    protected static ?string $navigationIcon = 'heroicon-o-cog';

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
                Tables\Columns\TextColumn::make('laboratory.number'),
                Tables\Columns\TextColumn::make('nos_of_printer'),
                Tables\Columns\TextColumn::make('nos_of_projector'),
                Tables\Columns\TextColumn::make('nos_of_usb_cable'),
                Tables\Columns\TextColumn::make('nos_of_hdd'),
                Tables\Columns\TextColumn::make('nos_of_vga_converter'),
                Tables\Columns\TextColumn::make('nos_of_graphics_tab'),
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
            'index' => Pages\ListAccessories::route('/'),
            'create' => Pages\CreateAccessory::route('/create'),
            'view' => Pages\ViewAccessory::route('/{record}'),
            'edit' => Pages\EditAccessory::route('/{record}/edit'),
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