<?php

namespace App\Modules\Tms;

use App\Modules\Tms\TravelResource\Pages;
use App\Modules\Tms\TravelResource\RelationManagers;
use App\Models\Travel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TravelResource extends Resource
{
    protected static ?string $model = Travel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Operacional';
    protected static ?string $navigationLabel = 'Viagem';
    protected static ?string $modelLabel = 'Viagem';
    protected static ?string $pluralModelLabel = 'Viagens';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('branch_id')
                    ->label('Filial')
                    ->relationship('branch', 'name')
                    ->required(),
                Forms\Components\Select::make('route_id')
                    ->label('Rota')
                    ->relationship('route', 'name')
                    ->required(),
                Forms\Components\Select::make('vehicle_id')
                    ->label('Veículo')
                    ->relationship('vehicle', 'id')
                    ->required(),
                Forms\Components\Select::make('driver_id')
                    ->label('Motorista')
                    ->relationship('driver', 'name')
                    ->required(),
                Forms\Components\DateTimePicker::make('trip_start_time')
                    ->required()
                    ->label('Início da Viagem'),
                Forms\Components\DateTimePicker::make('trip_end_time')
                    ->required()
                    ->label('Fim da Viagem'),
                Forms\Components\TextInput::make('ciot')
                    ->label('CIOT')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('branch.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('route.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('vehicle.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('driver.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('trip_start_time')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('trip_end_time')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ciot')
                    ->searchable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
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
            'index' => Pages\ListTravel::route('/'),
            'create' => Pages\CreateTravel::route('/create'),
            'edit' => Pages\EditTravel::route('/{record}/edit'),
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
