<?php

namespace App\Filament\Resources\Register\FreightTable;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\FreightTable;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Register\FreightTable\FreightTableResource\Pages;
use App\Models\CodeUf;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Leandrocfe\FilamentPtbrFormFields\Money;

class FreightTableResource extends Resource
{
    protected static ?string $model = FreightTable::class;

    protected static ?string $modelLabel = 'Tabela de Frete';

    protected static ?string $pluralModelLabel = 'Tabelas de Frete';

    protected static ?string $navigationIcon = 'heroicon-o-truck';

    protected static ?string $navigationGroup = 'Cadastros';

    protected static ?string $navigationLabel = 'Tabelas de Frete';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nome')
                    ->required(),
                DatePicker::make('start_date')
                    ->label('Data Inicio')
                    ->required(),
                DatePicker::make('end_date')
                    ->label('Data Final')
                    ->required(),
                Repeater::make('routes')
                    ->label('Rotas')
                    ->collapsible()
                    ->cloneable()
                    ->schema([
                        Select::make('origin_uf')
                            ->label('Filial Origem')
                            ->options(CodeUf::all()->pluck('federation_unit', 'id'))
                            ->required(),
                        Select::make('destination_uf')
                            ->label('Filial Destino')
                            ->options(CodeUf::all()->pluck('federation_unit', 'id'))
                            ->required(),
                        TextInput::make('minimum_weight')
                            ->label('Peso Minimo')
                            ->numeric()
                            ->inputMode('decimal'),
                        TextInput::make('maximum_weight')
                            ->label('Peso Maximo')
                            ->numeric()
                            ->inputMode('decimal'),
                        Money::make('price')
                            ->label('Valor'),
                        TextInput::make('delivery_days')
                            ->label('Dias Entrega')
                            ->numeric(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nome'),
                TextColumn::make('start_date')
                    ->label('Data Inicio')
                    ->dateTime(),
                TextColumn::make('end_date')
                    ->label('Data Final')
                    ->dateTime(),
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
            'index' => Pages\ListFreightTables::route('/'),
            'create' => Pages\CreateFreightTable::route('/create'),
            'edit' => Pages\EditFreightTable::route('/{record}/edit'),
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