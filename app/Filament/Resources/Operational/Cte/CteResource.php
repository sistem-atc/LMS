<?php

namespace App\Filament\Resources\Operational\Cte;

use App\Models\Cte;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Leandrocfe\FilamentPtbrFormFields\Money;
use App\Filament\Resources\Operational\Cte\CteResource\Pages;
use Filament\Forms\Components\DateTimePicker;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CteResource extends Resource
{
    protected static ?string $model = Cte::class;
    protected static ?string $navigationIcon = 'heroicon-o-truck';
    protected static ?string $navigationGroup = 'Operacional';
    protected static ?string $navigationLabel = 'Documento de Transporte';
    protected static ?string $modelLabel = 'Documento de Transporte';
    protected static ?string $pluralModelLabel = 'Documentos de Transporte';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make([
                    'default' => 1,
                ])
                    ->schema([
                        Tabs::make('Criar Documento')
                            ->tabs([
                                Tabs\Tab::make('Dados Filial')
                                    ->icon('heroicon-m-bell')
                                    ->columns(2)
                                    ->schema([
                                        TextInput::make('id')->label('Numero Docto')->disabled(),
                                        TextInput::make('serie')->label('Serie Docto'),
                                        Select::make('branch_id')
                                            ->label('Filial Emissora')
                                            ->searchable()
                                            ->preload()
                                            ->relationship('branch', 'abbreviation'),
                                        DateTimePicker::make('emission_date')->label('Data de Emissão')
                                            ->default(date('d-m-Y H:i:s', strtotime(now()))),
                                        TextInput::make('type_transportation')->label('Tipo de Transporte'),
                                        Select::make('origin_branch_id')
                                            ->label('Filial Origem')
                                            ->searchable()
                                            ->preload()
                                            ->relationship('branch', 'abbreviation'),
                                        Select::make('recipient_branch_id')
                                            ->label('Filial Destino')
                                            ->searchable()
                                            ->preload()
                                            ->relationship('branch', 'abbreviation'),
                                        Select::make('calculation_branch_id')
                                            ->label('Filial Calculo')
                                            ->searchable()
                                            ->preload()
                                            ->relationship('branch', 'abbreviation'),
                                        Select::make('debit_branch_id')
                                            ->label('Filial Debito')
                                            ->searchable()
                                            ->preload()
                                            ->relationship('branch', 'abbreviation'),
                                        Select::make('sender_customer_id')
                                            ->label('Cliente Remetente')
                                            ->searchable()
                                            ->relationship('sender_customer', 'company_name'),
                                        Select::make('recipient_customer_id')
                                            ->label('Cliente Destinatario')
                                            ->searchable()
                                            ->relationship('recipient_customer', 'company_name'),
                                        Select::make('consignee_customer_id')
                                            ->label('Cliente Consignatario')
                                            ->searchable()
                                            ->relationship('consignee_customer', 'company_name'),
                                        Select::make('debtor_customer_id')
                                            ->label('Cliente Devedor')
                                            ->searchable()
                                            ->relationship('debtor_customer', 'company_name'),
                                        Select::make('customer_calculation_id')
                                            ->label('Cliente Calculo')
                                            ->searchable()
                                            ->relationship('customer_calculation', 'company_name'),
                                    ]),
                                Tabs\Tab::make('Pesos')
                                    ->icon('heroicon-m-bell')
                                    ->columns(2)
                                    ->schema([
                                        TextInput::make('weight')->label('Peso')
                                            ->numeric()
                                            ->suffix('Kgs')
                                            ->inputMode('decimal'),
                                        TextInput::make('weight_m3')->label('Peso M3')
                                            ->numeric()
                                            ->suffix('M3')
                                            ->inputMode('decimal'),
                                        TextInput::make('weight_charged')->label('Peso Carregado')
                                            ->numeric()
                                            ->suffix('Kgs')
                                            ->inputMode('decimal'),
                                        TextInput::make('m3')->label('Cubagem')
                                            ->numeric()
                                            ->suffix('M3')
                                            ->inputMode('decimal'),
                                    ]),
                                Tabs\Tab::make('Dados Transporte')
                                    ->icon('heroicon-m-bell')
                                    ->columns(2)
                                    ->schema([
                                        Money::make('shipping_value')->label('Valor Frete'),
                                        Money::make('tax_amount')->label('Valor Impostos'),
                                        Money::make('total_value')->label('Valor Total'),
                                        Select::make('delivery_route_id')
                                            ->label('Rota')
                                            ->searchable()
                                            ->preload()
                                            ->relationship('delivery_route', 'name'),
                                        DatePicker::make('delivery_date')->label('Data de Entrega'),
                                        Select::make('cost_center_id')
                                            ->label('Centro de Custo')
                                            ->searchable()
                                            ->preload()
                                            ->relationship('cost_center', 'cost_center'),
                                    ]),
                                Tabs\Tab::make('Outros')
                                    ->icon('heroicon-m-bell')
                                    ->columns(2)
                                    ->schema([
                                        TextInput::make('lot')->label('Lote'),
                                        TextInput::make('shipping_table')->label('Tabela de Frete'),
                                        TextInput::make('shipping_table_order'),
                                        TextInput::make('shipping_type')->label('Modal'),
                                        TextInput::make('insurance'),
                                        TextInput::make('insurance_contract'),
                                        DateTimePicker::make('delivery_time')->label('Prazo de Entrega'),
                                        Toggle::make('doct_blocked')
                                            ->default(false)
                                            ->label('Docto Bloqueado')
                                            ->onColor('success')
                                            ->offColor('danger'),
                                        TextInput::make('cte_protocol')->label('Protocolo Sefaz')->disabled(),
                                        TextInput::make('cte_key')->label('Chave Cte')->disabled(),
                                        TextInput::make('cte_situation')->label('Situação Cte')->disabled(),
                                        TextInput::make('cte_sefaz_return')->label('Retorno Sefaz')->disabled(),
                                    ])
                            ])
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->searchable()
                    ->sortable()
                    ->label('Numero Docto'),
                TextColumn::make('branch.city')
                    ->searchable()
                    ->sortable()
                    ->label('Filial Emissora'),
                IconColumn::make('doct_blocked')
                    ->searchable()
                    ->sortable()
                    ->boolean()
                    ->label('Docto Bloqueado')
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                //Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListCtes::route('/'),
            'create' => Pages\CreateCte::route('/create'),
            'edit' => Pages\EditCte::route('/{record}/edit'),
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
