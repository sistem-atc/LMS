<?php

namespace App\Filament\Resources\HumanResources\Employee;

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
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TernaryFilter;
use Leandrocfe\FilamentPtbrFormFields\Cep;
use Leandrocfe\FilamentPtbrFormFields\Document;
use Filament\Forms\Components\DatePicker;
use App\Filament\Resources\HumanResources\Employee\EmployeeResource\Pages;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;
    protected static ?string $modelLabel = 'Funcionário';
    protected static ?string $pluralModelLabel = 'Funcionários';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Recursos Humanos';
    protected static ?string $navigationLabel = 'Funcionários';
    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make([
                    'default' => 1,
                ])
                ->schema([
                   Tabs::make('Employee Register')
                   ->tabs([
                        Tabs\Tab::make('Basic')
                            ->label('Dados Pessoais')
                            ->icon('carbon-document-horizontal')
                            ->columns(2)
                            ->schema(self::getBasicEmployee()),
                        Tabs\Tab::make('Address')
                            ->label('Endereço')
                            ->icon('carbon-stay-inside')
                            ->columns(2)
                            ->schema(self::getAddressEmployee()),
                        /*Tabs\Tab::make('admission')
                            ->label('Admissão')
                            ->icon('carbon-calendar-heat-map')
                            ->columns(2)
                            ->schema(self::getAdmissionEmployee()),*/
                   ]),
                ])
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
                    ->label('Email Corporativo'),
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
            ])
            ->bulkActions([
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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
            ]);
    }

    protected static function getBasicEmployee(): array
    {
        return [
            TextInput::make('name')
                ->required()
                ->rules([
                    function () {
                        return function ($property ,$value, Closure $fail) {
                            if (count(explode(' ', $value)) === 1) {
                                $fail('Informe o Nome Completo');
                            }
                        };
                    },
                ]),
            Document::make('cpf')
                ->cpf()
                ->label('CPF')
                ->required(),
            TextInput::make('personalmail')
                ->label('Email Pessoal')
                ->required()
                ->email(),
            Select::make('branch_id')
                ->label('Filial')
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
        ];
    }

    protected static function getAddressEmployee(): array
    {
        return [
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
            Hidden::make('siafi')
        ];
    }

    protected static function getAdmissionEmployee(): array
    {
        return [
            DatePicker::make('dateadmission')
                ->label('Data de Admissão'),
            DatePicker::make('datedemission')
                ->label('Data de Demissão'),
        ];
    }

}
