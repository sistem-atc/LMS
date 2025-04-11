<?php

namespace App\Modules\Finance\Billing;

use App\Models\Bill;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use App\Models\Situation;
use Filament\Tables\Table;
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
use App\Modules\Finance\Billing\BillResource\Pages;
use App\Modules\Finance\Billing\BillResource\Pages\SuportFunctions;
use App\Models\Customer;

class BillResource extends Resource
{
    protected static ?string $model = Bill::class;
    protected static ?string $navigationLabel = 'Faturamento';
    protected static ?string $navigationIcon = 'heroicon-o-credit-card';
    protected static ?string $navigationGroup = 'Financeiro';
    protected static ?string $modelLabel = 'Fatura';
    protected static ?string $pluralModelLabel = 'Faturas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Dados Fatura')
                        ->columns(2)
                        ->schema(static::getDataBilling()),
                    Wizard\Step::make('Ctes a faturar')
                        ->schema(fn(Get $get) => static::getDataDocuments($get('customer_id'))),
                    Wizard\Step::make('Dados Complementares')
                        ->columns(2)
                        ->schema(static::getComplementData()),
                    Wizard\Step::make('Informações')
                        ->columns(2)
                        ->schema(static::getInformations()),
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

    public static function getDataBilling(): array
    {
        return [
            Select::make('customer_id')
                ->label('Cliente')
                ->searchable()
                ->getSearchResultsUsing(
                    fn(string $search): array =>
                    DB::table('customers')
                        ->select(DB::raw("concat(cpf_or_cnpj, ' ', company_name) as name, id"))
                        ->where('cpf_or_cnpj', 'like', "%{$search}%")
                        ->orWhere('company_name', 'like', "%{$search}%")
                        ->limit(50)->pluck('name', 'id')->toArray()
                )
                ->reactive()
                ->afterStateUpdated(
                    function ($state, Set $set, Get $get) {
                        if (blank($state)) return;
                        $set('bank_id', Customer::where('id',    '=', $get('customer_id'))->first()->bank_id);
                        $duoDate = SuportFunctions::CalculateDuoDate($state, $get);
                        $set('due_date', $duoDate);
                    }
                ),
            DatePicker::make('emission_date')
                ->label('Data de Emissão')
                ->default(date('d-m-Y H:i:s', strtotime(now()))),
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
        ];
    }

    public static function getDataDocuments(?int $customer): array
    {

        $documents = SuportFunctions::SelectDocumentsBilling($customer);

        return [
            CheckboxList::make('transport_document_id')
                ->label(
                    is_null($documents)
                    ? 'Documentos a faturar'
                    : 'Nenhum documento encontrado'
                )
                ->bulkToggleable()
                ->options($documents)
                ->live()
                ->required()
                ->rule('array|min:1')
                ->validationMessages([
                    'required' => 'Você deve selecionar pelo menos um documento.',
                    'array' => 'A seleção de documentos deve ser uma lista.',
                    'min' => 'Selecione pelo menos um documento para faturar.',
                ]),
        ];
    }

    public static function getComplementData(): array
    {
        return [
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
                ->label('Desconto')
                ->disabled(fn (string $context): bool => $context === 'create'),
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
        ];
    }

    public static function getInformations(): array
    {
        return [
            TextInput::make('boleto_number')
                ->disabled()
                ->label('Numero do Boleto'),
            TextInput::make('barr_code')
                ->disabled()
                ->label('Codigo de Barras'),
            DatePicker::make('writeoff_date')
                ->disabled()
                ->label('Data de Baixa'),
            Select::make('receiving_type_id')
                ->disabled()
                ->label('Tipo de Recebimento'),
        ];
    }
}
