<?php

namespace App\Modules\Tms\Register\Vehicle;

use Filament\Forms;
use Filament\Tables;
use App\Models\Vehicle;
use Filament\Forms\Form;
use App\Enums\VehicleType;
use Filament\Tables\Table;
use App\Enums\VehicleStatus;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Modules\Tms\Register\Vehicle\VehicleResource\Pages;

class VehicleResource extends Resource
{
    protected static ?string $model = Vehicle::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $modelLabel = 'Veiculo';
    protected static ?string $pluralModelLabel = 'Veiculos';
    protected static ?string $navigationGroup = 'Cadastros';
    protected static ?string $navigationLabel = 'Veiculos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()
                    ->schema([
                        Select::make('type')
                            ->label('Tipo de Veiculo')
                            ->options(VehicleType::class)
                            ->required(),
                        TextInput::make('brand')
                            ->label('Brand')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('model')
                            ->label('Modelo')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('license_plate')
                            ->label('Numero Licenciamento')
                            ->required()
                            ->maxLength(10),
                        TextInput::make('renavam')
                            ->label('Renavam')
                            ->required()
                            ->maxLength(11),
                        TextInput::make('chassis')
                            ->label('Chassis')
                            ->required()
                            ->maxLength(17),
                    ]),
                Grid::make()
                    ->schema(
                        [
                            DatePicker::make('manufacture_year')
                                ->label('Ano de Fabricação')
                                ->required(),
                            TextInput::make('model_year')
                                ->label('Ano Modelo')
                                ->required(),
                            TextInput::make('color')
                                ->label('Cor')
                                ->maxLength(255),
                            TextInput::make('license_plate_state')
                                ->label('Estado de Licenciamento')
                                ->required()
                                ->maxLength(2),
                            TextInput::make('registration_number')
                                ->label('Numero de Registro')
                                ->maxLength(255),
                            DatePicker::make('acquisition_date')
                                ->label('Data da Compra'),
                            TextInput::make('tare_weight')
                                ->numeric(),
                            TextInput::make('max_load_kg')
                                ->label('Carga Maxima KG')
                                ->numeric(),
                            TextInput::make('max_volume_m3')
                                ->label('Carga Maxima m3')
                                ->numeric(),
                            TextInput::make('owner_name')
                                ->label('Nome Proprietario')
                                ->maxLength(255),
                            TextInput::make('owner_document')
                                ->label('Documento Proprietario')
                                ->maxLength(20),
                            Select::make('status')
                                ->label('Status')
                                ->options(VehicleStatus::class)
                                ->required(),
                        ]
                    )
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
