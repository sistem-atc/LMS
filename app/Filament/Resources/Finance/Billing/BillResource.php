<?php

namespace App\Filament\Resources\Finance\Billing;

use App\Models\Bill;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use App\Models\Situation;
use Filament\Tables\Table;
use App\Models\ReceivingType;
use Filament\Resources\Resource;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\CheckboxList;
use Leandrocfe\FilamentPtbrFormFields\Money;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Finance\Billing\BillResource\Pages;
use App\Filament\Resources\Finance\Billing\BillResource\Pages\SuportFunctions;
use App\Models\Customer;

class BillResource extends Resource
{
    protected static ?string $model = Bill::class;
    protected static ?string $modelLabel = 'Fatura';
    protected static ?string $pluralModelLabel = 'Faturas';
    protected static ?string $navigationLabel = 'Faturamento';
    protected static ?string $navigationIcon = 'heroicon-o-credit-card';
    protected static ?string $navigationGroup = 'Financeiro';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Dados Fatura')
                        ->columns(2)
                        ->schema([
                        Select::make('customer_id')
                            ->label('Cliente')
                            ->searchable()
                            ->getSearchResultsUsing(
                                fn (string $search): array =>
                                    DB::table('customers')
                                        ->select(DB::raw("concat(cpf_or_cnpj, ' ', company_name) as name, id"))
                                        ->where('cpf_or_cnpj', 'like', "%{$search}%")
                                        ->orWhere('company_name', 'like', "%{$search}%")
                                        ->limit(50)->pluck('name', 'id')->toArray()
                                )
                            ->reactive()
                            ->afterStateUpdated(
                                function($state, Set $set, Get $get){
                                    if(blank($state)) return;
                                    $set('bank_id', Customer::where($get('customer_id'))->bank()->id);
                                    $duoDate = SuportFunctions::CalculateDuoDate($state, $get);
                                    $set('due_date', $duoDate);
                                }
                            ),
                        DatePicker::make('emission_date')
                            ->label('Data de Emissão')
                            ->default(date('d-m-Y H:i:s',strtotime(now()))),
                        DatePicker::make('due_date')
                            ->label('Data de Vencimento')
                            ->placeholder('dd/mm/aaaa'),
                        TextInput::make('historic')
                            ->label('Historico'),
                        Select::make('situation_id')
                            ->label('Situação')
                            ->searchable()
                            ->relationship('situation', 'name')
                            ->options(json_decode(Situation::all()->pluck('name', 'id')->toJson(), true)),
                        ]),
                    Wizard\Step::make('Ctes a faturar')
                        ->schema([
                            CheckboxList::make('cte_id')->label('Escolha os CTe a serem faturados')
                                ->noSearchResultsMessage('Sem Ctes pendentes de faturamento')
                                ->searchPrompt('Pesquisando Cte a serem faturados')
                                ->bulkToggleable()
                                ->options(
                                    fn(Get $get): ?Collection =>
                                        DB::table('ctes')
                                        ->join('branches', 'ctes.branch_id', '=', 'branches.id')
                                        ->select(DB::raw("
                                            concat('Origem: ', branches.abbreviation, ' | ', 'Numero do CT-e: ', ctes.id,
                                            ' | ', 'Serie: ', ctes.serie, ' | ', 'Valor Total: ', format(ctes.total_value, 2, 'de_DE')) as id,
                                            ctes.id as cte"))
                                        ->where('ctes.debtor_customer_id', '=', $get('customer_id'))
                                        ->where('ctes.doct_blocked', '=', '0')
                                        ->where('ctes.bill', '=', '')
                                        ->get()->pluck('id', 'cte'),
                                )
                                ->live(),
                        ]),
                    Wizard\Step::make('Dados Complementares')
                        ->columns(2)
                        ->schema([
                            Select::make('nature_id')
                                ->label('Natureza')
                                ->native(false)
                                ->searchable()
                                ->preload()
                                ->relationship('nature', 'name'),
                            Select::make('bank_id')
                                ->label('Banco')
                                ->native(false)
                                ->searchable()
                                ->preload()
                                ->relationship('bank', 'nome_banco'),
                            Money::make('total_value')
                                ->disabled()
                                ->label('Valor Total'),
                            Money::make('discount_value')
                                ->label('Desconto'),
                            Money::make('liquid_value')
                                ->disabled()
                                ->label('Valor Liquido'),
                            Money::make('irrf_base')
                                ->disabled()
                                ->label('Base IRRF'),
                            TextInput::make('irrf_tax')
                                ->disabled()
                                ->label('Taxa IRRF')
                                ->numeric()
                                ->inputMode('decimal'),
                            Money::make('irrf_value')
                                ->disabled()
                                ->label('Valor IRRF'),
                            Money::make('iss_base')
                                ->disabled()
                                ->label('Base ISS'),
                            TextInput::make('iss_tax')
                                ->disabled()
                                ->label('Taxa ISS')
                                ->numeric()
                                ->inputMode('decimal'),
                            Money::make('iss_value')
                                ->disabled()
                                ->label('Valor ISS'),
                            Money::make('fine')
                                ->disabled()
                                ->label('Juros'),
                            Money::make('interests')
                                ->disabled()
                                ->label('Multa'),
                        ]),
                    Wizard\Step::make('Informações')
                        ->columns(2)
                        ->schema([
                            TextInput::make('boleto_number')
                                ->disabled()
                                ->label('Numero do Boleto'),
                            TextInput::make('barr_code')
                                ->disabled()
                                ->label('Codigo de Barras'),
                                DatePicker::make('writeoff_date')
                                ->label('Data de Baixa'),
                            Select::make('receiving_type_id')
                                ->label('Tipo de Recebimento')
                                ->searchable()
                                ->preload()
                                ->relationship('receiving_type', 'name')
                                ->options(ReceivingType::all()->pluck('name', 'id')),
                        ]),
                ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('customer_id'),
                TextColumn::make('total_value'),
                TextColumn::make('discount_value'),
                TextColumn::make('liquid_value'),
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
            'index' => Pages\ListBills::route('/'),
            'create' => Pages\CreateBill::route('/create'),
            'edit' => Pages\EditBill::route('/{record}/edit'),
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
