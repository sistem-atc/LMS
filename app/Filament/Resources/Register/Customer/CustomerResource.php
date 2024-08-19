<?php

namespace App\Filament\Resources\Register\Customer;

use App\Enums\CustomerRiscEnum;
use Filament\Tables;
use Filament\Forms\Get;
use App\Models\Customer;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Leandrocfe\FilamentPtbrFormFields\Cep;
use Leandrocfe\FilamentPtbrFormFields\PhoneNumber;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Shield\Token\TokenResource;
use App\Filament\Resources\Register\Customer\CustomerResource\Pages;
use App\Filament\Resources\Register\Customer\CustomerResource\Pages\SuportFunctions;
use App\Filament\Resources\Register\GroupCustomer\GroupCustomerResource;
use App\Filament\Resources\Register\PaymentTerm\PaymentTermResource;

class CustomerResource extends Resource
{

    protected static ?string $model = Customer::class;
    protected static ?string $modelLabel = 'Cliente';
    protected static ?string $pluralModelLabel = 'Clientes';
    protected static ?string $navigationIcon = 'heroicon-o-user-plus';
    protected static ?string $navigationGroup = 'Cadastros';
    protected static ?string $navigationLabel = 'Clientes';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Grid::make([
                'default' => 1,
            ])->schema([
                    Tabs::make('')->tabs([
                        Tabs\Tab::make('default')
                            ->schema(static::getTabDefault())
                            ->label('Principal'),
                        Tabs\Tab::make('address')
                            ->schema(static::getTabAddress())
                            ->label('Endereço'),
                        Tabs\Tab::make('others')
                            ->schema(static::getTabOthers())
                            ->label('Outros'),
                        Tabs\Tab::make('multisoftware')
                            ->schema(static::getTabMultiSoftware())
                            ->columns(2)
                            ->label('MultiEmbarcador'),
                        Tabs\Tab::make('tokenapi')
                            ->schema(static::getTabTokenApi())
                            ->hidden(fn() => !auth()->user()->can('create_token'))
                            ->label('Token API'),
                        ]),
                ])
            ]);
    }

    private static function getTabDefault() : array
    {
        return [
            Section::make('')
                ->schema([
                    Select::make('type_person')
                        ->label('Tipo de Pessoa')
                        ->live()
                        ->options([
                            'F' => 'Fisica',
                            'J' => 'Juridica',
                        ]),
                    TextInput::make('cpf_or_cnpj')
                        ->live()
                        //->rules([fn (Get $get) => SuportFunctions::validar_cnpj($get('cpf_or_cnpj'))])
                        ->mask(fn(Get $get): string => ($get('type_person') === 'J') ? '99.999.999/9999-99' : '999.999.999-99')
                        ->label('CPF ou CNPJ'),
                ])->columns(2),
            Section::make('')
                ->schema([
                    TextInput::make('company_name')
                        ->label('Nome ou Razão Social'),
                    TextInput::make('fantasy_name')
                        ->label('Nome Fantasia'),
                ])->columns(2),
        ];
    }

    private static function getTabAddress() : array
    {
        return [
            Section::make('')
                ->schema([
                    Section::make('')->schema([
                        Cep::make('postal_code')
                            ->label('CEP')
                            ->viaCep(
                                mode: 'suffix',
                                errorMessage: 'CEP inválido.',
                                setFields: [
                                    'postal_code' => 'cep',
                                    'street' => 'logradouro',
                                    'number' => 'numero',
                                    'complement' => 'complemento',
                                    'district' => 'bairro',
                                    'city' => 'localidade',
                                    'state' => 'uf',
                                    'ibge' => 'ibge',
                                    'gia' => 'gia',
                                    'ddd' => 'ddd',
                                    'siafi' => 'siafi',
                                ]
                            ),
                        TextInput::make('complement')->label('Complemento'),
                    ])->columns(2),
                    Grid::make('')
                        ->schema([
                            TextInput::make('street')->label('Rua'),
                            TextInput::make('number')->label('Número'),
                        ])->columns(2),
                    TextInput::make('district')->label('Bairro'),
                    TextInput::make('city')->label('Cidade'),
                    TextInput::make('state')->label('UF'),
                    Hidden::make('ibge'),
                    Hidden::make('gia'),
                    Hidden::make('ddd'),
                    Hidden::make('siafi')
                ])->columns(3),
        ];
    }

    private static function getTabOthers() : array
    {
        return [
                Section::make('')
                    ->schema([
                        Grid::make('')
                            ->schema([
                                TextInput::make('municipal_registration')
                                    ->label('Incrição Municipal'),
                                TextInput::make('state_registration')
                                    ->label('Incrição Estadual'),
                            ])->columns(2),
                        Grid::make('')
                            ->schema([
                                PhoneNumber::make('phone_number')
                                    ->label('Numero Telefone')
                                    ->format('(99)9999-9999'),
                                PhoneNumber::make('cellphone')
                                    ->label('Numero Celular')
                                    ->format('(99)99999-9999'),
                            ])->columns(2),
                        TextInput::make('region')
                            ->label('Região'),
                        Select::make('branch_id')
                            ->label('Filial')
                            ->searchable()
                            ->preload()
                            ->relationship('branch', 'abbreviation'),
                        Select::make('nature_id')
                            ->label('Natureza')
                            ->searchable()
                            ->preload()
                            ->relationship('nature', 'name'),
                        Select::make('vendor_id')
                            ->label('Vendedor')
                            ->searchable()
                            ->preload()
                            ->relationship('vendor', 'name'),
                        Select::make('bank_id')
                            ->searchable()
                            ->preload()
                            ->relationship('bank', 'nome_banco')
                            ->label('Banco Padrão'),
                        TextInput::make('priority')
                            ->label('Prioridade')
                            ->default(0),
                        Select::make('risc')
                            ->label('Risco')
                            ->options(CustomerRiscEnum::class)
                            ->default('A'),
                        TextInput::make('mail_operational')
                            ->label('Email Operacional'),
                        TextInput::make('mail_financial')
                            ->label('Email Financeiro'),
                        Select::make('group_customer_id')
                            ->label('Grupo Cliente')
                            ->searchable()
                            ->preload()
                            ->relationship('group_customer', 'name')
                            ->createOptionForm(GroupCustomerResource::groupForm()),
                        Select::make('payment_term_id')
                            ->label('Prazo de Pagamento')
                            ->searchable()
                            ->preload()
                            ->relationship('payment_term', 'name')
                            ->createOptionForm(PaymentTermResource::paymentForm()),
                        Select::make('edi_pattern_id')
                            ->label('Padrão EDI')
                            ->searchable()
                            ->preload()
                            ->relationship('edi_pattern', 'name'),
                    ])
                    ->columns(3)

        ];
    }

    private static function getTabMultiSoftware() : array
    {
        return [
            TextInput::make('BaseEndpoint')
                ->label('Endpoint MultiSoftware'),
            TextInput::make('token_multisoftware')
                ->label('Token MultiSoftware'),
        ];
    }

    public static function getTabTokenApi($isTokenexists = false) : array
    {

        //Incluir Regra de Validação para aparecer o Token em caso de token já existente em cadastro
        //Do Contrario para criar o token
        if($isTokenexists) {
            return [
                TextInput::make('token_api')
                    ->label('Token Gerado')
                    ->readOnly()
                    ->password()
                    ->revealable(),
            ];
        } else {
            return [
                TextInput::make('name')
                    ->label('Nome'),
                Section::make('Habilidades')
                    ->description('Selecione as habilidades do token')
                    ->schema(TokenResource::getAbilitiesSchema()),
            ];
        };
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('branch.abbreviation')
                    ->label('Filial'),
                TextColumn::make('cpf_or_cnpj')
                    ->label('CPF ou CNPJ')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('company_name')
                    ->label('Nome ou Razão Social')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('city')
                    ->label('Cidade'),
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
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
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
