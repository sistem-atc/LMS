<?php

namespace App\Modules\Tms\Vehicle;

use App\Modules\Tms\Vehicle\VehicleResource\Pages;
use App\Modules\Tms\Vehicle\VehicleResource\RelationManagers;
use App\Models\Vehicle;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VehicleResource extends Resource
{
    protected static ?string $model = Vehicle::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('type')
                    ->required(),
                Forms\Components\TextInput::make('brand')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('model')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('license_plate')
                    ->required()
                    ->maxLength(10),
                Forms\Components\TextInput::make('renavam')
                    ->required()
                    ->maxLength(11),
                Forms\Components\TextInput::make('chassis')
                    ->required()
                    ->maxLength(17),
                Forms\Components\TextInput::make('manufacture_year')
                    ->required(),
                Forms\Components\TextInput::make('model_year')
                    ->required(),
                Forms\Components\TextInput::make('color')
                    ->maxLength(255),
                Forms\Components\TextInput::make('license_plate_state')
                    ->required()
                    ->maxLength(2),
                Forms\Components\TextInput::make('registration_number')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('acquisition_date'),
                Forms\Components\TextInput::make('tare_weight')
                    ->numeric(),
                Forms\Components\TextInput::make('max_load_kg')
                    ->numeric(),
                Forms\Components\TextInput::make('max_volume_m3')
                    ->numeric(),
                Forms\Components\TextInput::make('owner_name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('owner_document')
                    ->maxLength(20),
                Forms\Components\TextInput::make('status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('brand')
                    ->searchable(),
                Tables\Columns\TextColumn::make('model')
                    ->searchable(),
                Tables\Columns\TextColumn::make('license_plate')
                    ->searchable(),
                Tables\Columns\TextColumn::make('renavam')
                    ->searchable(),
                Tables\Columns\TextColumn::make('chassis')
                    ->searchable(),
                Tables\Columns\TextColumn::make('manufacture_year'),
                Tables\Columns\TextColumn::make('model_year'),
                Tables\Columns\TextColumn::make('tare_weight')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('max_load_kg')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('max_volume_m3')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
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
            'index' => Pages\ListVehicles::route('/'),
            'create' => Pages\CreateVehicle::route('/create'),
            'edit' => Pages\EditVehicle::route('/{record}/edit'),
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
