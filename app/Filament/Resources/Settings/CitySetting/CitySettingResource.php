<?php

namespace App\Filament\Resources\Settings\CitySetting;

use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\CitySetting;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Services\Utils\Towns\Helpers\GetClassTowns;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Settings\CitySetting\CitySettingResource\Pages;
use Filament\Forms\Components\Grid;

class CitySettingResource extends Resource
{
    protected static ?string $model = CitySetting::class;

    protected static ?string $modelLabel = 'Configurar Prefeitura';

    protected static ?string $pluralModelLabel = 'Prefeituras';

    protected static ?string $navigationGroup = 'Configurações';

    protected static ?string $navigationLabel = 'Prefeitura';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)
                    ->schema([
                        TextInput::make('city_name')
                            ->label('Cidade')
                            ->required(),
                        TextInput::make('ibge')
                            ->required()
                            ->numeric(),
                    ]),
                Grid::make(2)
                    ->schema([
                        TextInput::make('url_prod')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('url_homolog')
                            ->required()
                            ->maxLength(255),
                    ]),
                Grid::make(3)
                    ->schema([
                        TextInput::make('headerversion')
                            ->maxLength(255),
                        TextInput::make('namespace')
                            ->maxLength(255),
                        TextInput::make('version')
                            ->required()
                            ->maxLength(255)
                            ->default(0),
                    ]),
                Grid::make(1)
                    ->schema([
                        Select::make('class_path')
                            ->label('Selecione o sistema que está associada a cidade')
                            ->options(fn() => GetClassTowns::getClassesTowns(app_path('Services/Towns')))
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('city_name')
                    ->label('Nome da Cidade')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ibge')
                    ->label('IBGE')
                    ->searchable(),
                Tables\Columns\TextColumn::make('url_prod')
                    ->label('URL Produção')
                    ->searchable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageCitySettings::route('/'),
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
