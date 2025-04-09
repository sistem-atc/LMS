<?php

namespace App\Modules\HumanResources\Register\Employee;

use Closure;
use Filament\Tables;
use App\Models\Employee;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Wizard;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Wizard\Step;
use Filament\Tables\Filters\TernaryFilter;
use Leandrocfe\FilamentPtbrFormFields\Cep;
use Leandrocfe\FilamentPtbrFormFields\Document;
use App\Modules\HumanResources\Register\Employee\EmployeeResource\Pages;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Recursos Humanos';
    protected static ?string $navigationLabel = 'Funcionários';
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $modelLabel = 'Funcionário';
    protected static ?string $pluralModelLabel = 'Funcionários';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Step::make('Dados Pessoais')->schema(self::getBasicEmployee()),
                    Step::make('Contato e Endereço')->schema(self::getContactAddressEmployee()),
                    Step::make('Dados Profissionais')->schema(self::getProffisionalDataEmployee()),
                    Step::make('Dados Bancarios e Beneficios')->schema(self::getBankingBenefitsEmployee()),
                    Step::make('Outros')->schema(self::getOthersEmployee()),
                ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nome'),
                TextColumn::make('personalmail')
                    ->label('Email Pessoal'),
                TextColumn::make('user.email')
                    ->label('Email Corporativo')
                    ->copyable(),
                TextColumn::make('branch.abbreviation')
                    ->label('Filial'),
                IconColumn::make('is_active')
                    ->boolean()
                    ->falseIcon('heroicon-o-x-mark')
                    ->label('Ativo')
            ])
            ->filters([
                TernaryFilter::make('is_active'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([]);
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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([]);
    }

    protected static function getBasicEmployee(): array
    {
        return [
            Grid::make(2)->schema([
                TextInput::make('name')
                    ->label('Nome Completo')
                    ->required()
                    ->rules([
                        function () {
                            return function ($property, $value, Closure $fail) {
                                if (count(explode(' ', $value)) === 1) {
                                    $fail('Informe o Nome Completo');
                                }
                            };
                        },
                    ]),
                TextInput::make('social_name')
                    ->label('Nome Social'),
                TextInput::make('mother_name')
                    ->label('Nome da Mãe')
                    ->required(),
                TextInput::make('father_name')
                    ->label('Nome do Pai'),
                Document::make('cpf')
                    ->cpf()
                    ->label('CPF')
                    ->required(),
                Document::make('cnh')
                    ->label('CNH')
                    ->required(),
                Document::make('pis')
                    ->label('PIS')
                    ->required(),
                Document::make('rg')
                    ->label('RG')
                    ->required(),
                TextInput::make('rg_uf')
                    ->label('UF do RG')
                    ->required(),
                TextInput::make('eleitor_title')
                    ->label('Título de Eleitor')
                    ->required(),
                TextInput::make('eleitoral_zone')
                    ->label('Zona Eleitoral')
                    ->required(),
                TextInput::make('selector_section')
                    ->label('Seção Eleitoral')
                    ->required(),
                DatePicker::make('birth_date')
                    ->label('Data de Nascimento')
                    ->required(),
                Select::make('sex')
                    ->label('Sexo')
                    ->options([
                        'M' => 'Masculino',
                        'F' => 'Feminino',
                    ])
                    ->required(),
                Select::make('civil_state')
                    ->label('Estado Civil')
                    ->options([
                        'solteiro' => 'Solteiro',
                        'casado' => 'Casado',
                        'divorciado' => 'Divorciado',
                        'viuvo' => 'Viúvo',
                    ])
                    ->required(),
                Select::make('nationality')
                    ->label('Nacionalidade')
                    ->options([
                        'brasileiro' => 'Brasileiro',
                        'estrangeiro' => 'Estrangeiro',
                    ])
                    ->required(),
                Textinput::make('born_city')
                    ->label('Cidade de Nascimento')
                    ->required(),
                Select::make('branch_id')
                    ->label('Filial')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->relationship('branch', 'abbreviation'),
                Toggle::make('is_active')
                    ->label('Ativo')
                    ->default(true)
                    ->inline()
                    ->onColor('success')
                    ->offColor('danger'),
                Hidden::make('user_id'),
            ])
        ];
    }

    protected static function getContactAddressEmployee(): array
    {
        return [
            Grid::make(2)->schema([
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
                TextInput::make('street')
                    ->label('Rua'),
                TextInput::make('number')
                    ->label('Número'),
                TextInput::make('complement')
                    ->label('Complemento'),
                TextInput::make('district')
                    ->label('Bairro'),
                TextInput::make('city')
                    ->label('Cidade'),
                TextInput::make('state')
                    ->label('UF'),
                Hidden::make('ibge'),
                Hidden::make('gia'),
                Hidden::make('ddd'),
                Hidden::make('siafi'),
                TextInput::make('phone')
                    ->label('Telefone')
                    ->tel(),
                TextInput::make('personalmail')
                    ->label('Email Pessoal')
                    ->required()
                    ->email(),
            ])
        ];
    }

    protected static function getProffisionalDataEmployee(): array
    {
        return [
            Grid::make(2)->schema([
                Select::make('cargo_id')
                    ->relationship('cargo', 'nome')->required(),
                Select::make('departamento_id')
                    ->relationship('departamento', 'nome')->required(),
                TextInput::make('salary')
                    ->label('Salário')
                    ->numeric()
                    ->required(),
                DatePicker::make('admission_date')
                    ->label('Data de Admissão')
                    ->required(),
                Select::make('contract_type')
                    ->label('Tipo de Contrato')
                    ->options([
                        'clt' => 'CLT',
                        'pj' => 'Pessoa Jurídica',
                        'estagio' => 'Estágio',
                    ])
                    ->required(),
                TextInput::make('ctps')
                    ->label('CTPS')
                    ->required(),
                Select::make('school_level')
                    ->label('Escolaridade')
                    ->options([
                        'fundamental' => 'Fundamental',
                        'medio' => 'Médio',
                        'superior' => 'Superior',
                        'pos_graduacao' => 'Pós Graduação',
                        'mestrado' => 'Mestrado',
                        'doutorado' => 'Doutorado',
                    ])
                    ->required(),
            ])
        ];
    }

    protected static function getBankingBenefitsEmployee(): array
    {
        return [
            Grid::make(2)->schema([
                TextInput::make('bank')
                    ->label('Banco'),
                TextInput::make('agency')
                    ->label('Agência'),
                TextInput::make('account')
                    ->label('Conta'),
                Select::make('account_type')
                    ->label('Tipo de Conta')
                    ->options([
                        'corrente' => 'Corrente',
                        'poupanca' => 'Poupança',
                        'salario' => 'Salário',
                    ]),
                Toggle::make('transportation_voucher')
                    ->label('Vale Transporte'),
                Toggle::make('meal_voucher')
                    ->label('Vale Refeição'),
                Toggle::make('food_voucher')
                    ->label('Vale Alimentação'),
                Toggle::make('dental_plan')
                    ->label('Plano Odontológico'),
                Toggle::make('basic_cest')
                    ->label('Cesta Básica'),
                Toggle::make('life_insurance')
                    ->label('Seguro de Vida'),
                Toggle::make('private_pension')
                    ->label('Previdência Privada'),
                Toggle::make('health_plan')
                    ->label('Plano de Saúde'),
                Select::make('health_plan_type')
                    ->label('Tipo de Plano de Saúde')
                    ->options([
                        'individual' => 'Individual',
                        'family' => 'Familiar',
                    ]),
                Select::make('health_plan_company_id')
                    ->label('Plano de Saúde da Empresa')
                    ->relationship('healthPlanCompany', 'name')
                    ->preload()
                    ->searchable()
                    ->placeholder('Selecione um plano de saúde')
                    ->visible(fn (Closure $get) => $get('health_plan_company') === true),
            ])
        ];
    }

    protected static function getOthersEmployee(): array
    {

        return [
            Grid::make(2)->schema([
                Select::make('social_security_regime')
                    ->label('Regime Previdenciário')
                    ->options([
                        'rgps' => 'Regime Geral de Previdência Social',
                        'rpps' => 'Regime Próprio de Previdência Social',
                        'rppe' => 'Regime Próprio de Previdência Exterior',
                    ]),

            ])
        ];
    }
}
