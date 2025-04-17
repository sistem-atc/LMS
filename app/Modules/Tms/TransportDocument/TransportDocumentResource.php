<?php

namespace App\Modules\Tms\TransportDocument;

use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use App\Models\TransportDocument;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;
use App\Enums\TypeTransportationEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use App\Enums\TypeDocumentTransportEnum;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Leandrocfe\FilamentPtbrFormFields\Money;
use Filament\Forms\Components\DateTimePicker;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Modules\Tms\TransportDocument\TransportDocumentResource\Pages;

class TransportDocumentResource extends Resource
{
    protected static ?string $model = TransportDocument::class;

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
                                    ->schema(self::getBranchData()),
                                Tabs\Tab::make('Pesos')
                                    ->icon('heroicon-m-bell')
                                    ->columns(2)
                                    ->schema(self::getWeightData()),
                                Tabs\Tab::make('Dados Transporte')
                                    ->icon('heroicon-m-bell')
                                    ->columns(2)
                                    ->schema(self::getTransportData()),
                                Tabs\Tab::make('Outros')
                                    ->icon('heroicon-m-bell')
                                    ->columns(2)
                                    ->schema(self::getOthersData()),
                                Tabs\Tab::make('Notas de Serviço')
                                    ->icon('heroicon-m-bell')
                                    ->columns(2)
                                    ->schema(self::getServiceNotesData()),
                            ]),
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
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListTransportDocuments::route('/'),
            'create' => Pages\CreateTransportDocument::route('/create'),
            'edit' => Pages\EditTransportDocument::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    private static function getBranchData(): array
    {
        return [
            TextInput::make('number')
                ->label('Numero Docto')
                ->disabled()
                ->helperText('Numero do CT-e gerado automaticamente'),
            TextInput::make('serie')
                ->label('Serie Docto')
                ->disabled()
                ->default('A'),
            TextInput::make('branch_emission_id')
                ->label('Filial Emissora')
                ->disabled()
                ->default(Filament::auth()->user()->branch_logged_id->abbreviation),
            DateTimePicker::make('emission_date')->label('Data de Emissão')
                ->default(date('d-m-Y H:i:s', strtotime(now()))),
            Select::make('type_transportation')
                ->label('Tipo de Transporte')
                ->options(TypeTransportationEnum::cases()),
            Select::make('origin_branch_id')
                ->label('Filial Origem')
                ->searchable()
                ->preload()
                ->relationship('origin_branch', 'abbreviation'),
            Select::make('recipient_branch_id')
                ->label('Filial Destino')
                ->searchable()
                ->preload()
                ->relationship('recipient_branch', 'abbreviation'),
            Select::make('calculation_branch_id')
                ->label('Filial Calculo')
                ->searchable()
                ->preload()
                ->relationship('calculation_branch', 'abbreviation'),
            Select::make('debit_branch_id')
                ->label('Filial Debito')
                ->searchable()
                ->preload()
                ->relationship('debit_branch', 'abbreviation'),
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
        ];
    }

    private static function getWeightData(): array
    {
        return [
            TextInput::make('total_weight')
                ->label('Peso')
                ->numeric()
                ->required()
                ->suffix('Kgs')
                ->inputMode('decimal'),
            TextInput::make('total_weight_m3')->label('Peso M3')
                ->numeric()
                ->required()
                ->suffix('M3')
                ->inputMode('decimal'),
            TextInput::make('total_weight_charged')->label('Peso Carregado')
                ->numeric()
                ->required()
                ->suffix('Kgs')
                ->inputMode('decimal'),
            TextInput::make('total_m3')->label('Cubagem')
                ->numeric()
                ->required()
                ->suffix('M3')
                ->inputMode('decimal'),
            TextInput::make('total_volume')
                ->label('Volume')
                ->numeric()
                ->required(),
        ];
    }

    private static function getTransportData(): array
    {
        return [
            Money::make('shipping_value')
                ->required()
                ->minValue(0)
                ->label('Valor Frete'),
            Money::make('tax_amount')
                ->required()
                ->minValue(0)
                ->label('Valor Impostos'),
            Money::make('total_value')
                ->required()
                ->minValue(0)
                ->label('Valor Total'),
            Select::make('delivery_route_id')
                ->label('Rota')
                ->searchable()
                ->preload()
                ->relationship('delivery_route', 'name'),
            DatePicker::make('delivery_time_real')
                ->required()
                ->label('Data de Entrega'),
            Select::make('costcenter_id')
                ->label('Centro de Custo')
                ->searchable()
                ->preload()
                ->relationship('cost_center', 'cost_center'),
        ];
    }

    private static function getServiceNotesData(): array
    {
        return [
            TextInput::make('number_nfse')
                ->label('Numero da Nota Fiscal'),
            TextInput::make('verification_code')
                ->label('Codigo de Verificacao'),
            DateTimePicker::make('emission_date_nfse')
                ->label('Data de Emissão NFSe'),
        ];
    }

    private static function getOthersData(): array
    {
        return [
            TextInput::make('lot_id')
                ->disabled()
                ->label('Lote'),
            Select::make('shipping_table')
                ->required()
                ->label('Tabela de Frete')
                ->relationship('freight_table', 'name'),
            TextInput::make('shipping_table_order')
                ->label('Tabela de Frete Ordem'),
            TextInput::make('shipping_type')
                ->label('Modal de Frete'),
            TextInput::make('insurance_contract')
                ->label('Apólice de Seguro'),
            DateTimePicker::make('delivery_date_prevision')
                ->label('Prazo de Entrega'),
            Toggle::make('doct_blocked')
                ->default(false)
                ->label('Docto Bloqueado')
                ->onColor('success')
                ->offColor('danger'),
            TextInput::make('cte_protocol')
                ->label('Protocolo Sefaz')
                ->disabled(),
            TextInput::make('cte_key')
                ->label('Chave Cte')
                ->disabled(),
            TextInput::make('cte_sefaz_return')
                ->label('Situação Cte')
                ->disabled(),
            TextInput::make('cte_situation')
                ->label('Retorno Sefaz')
                ->disabled(),
            Select::make('type_document')
                ->label('Tipo de Documento')
                ->options(TypeDocumentTransportEnum::class),
            Select::make('fiscal_rule_id')
                ->label('Regra Fiscal')
                ->searchable()
                ->preload()
                ->relationship('fiscal_rule', 'name'),
            TextInput::make('last_sefaz_return_id')
                ->label('Ultimo Retorno Sefaz')
                ->disabled(),
            Select::make('cotation_id')
                ->label('Cotações')
                ->searchable()
                ->preload()
                ->relationship('cotation', 'name'),
        ];
    }
}
