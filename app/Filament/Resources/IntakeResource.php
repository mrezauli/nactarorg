<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Intake;
use Illuminate\Support\Str;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\IntakeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\IntakeResource\RelationManagers;

class IntakeResource extends Resource
{
    protected static ?string $model = Intake::class;

    protected static ?string $navigationGroup = 'Training';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Hidden::make('slug')
                    ->default(Str::uuid()),
                Forms\Components\TextInput::make('code')
                    ->required()
                    ->numeric(),
                Select::make('batchId')
                    ->required()
                    ->relationship('batch', 'serial'),
                Select::make('courseId')
                    ->required()
                    ->relationship('course', 'name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('batch.serial'),
                Tables\Columns\TextColumn::make('course.name'),
                Tables\Columns\TextColumn::make('code'),
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
            'index' => Pages\ListIntakes::route('/'),
            'create' => Pages\CreateIntake::route('/create'),
            'view' => Pages\ViewIntake::route('/{record}'),
            'edit' => Pages\EditIntake::route('/{record}/edit'),
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