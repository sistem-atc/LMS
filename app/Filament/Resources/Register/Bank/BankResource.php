<?php

namespace App\Filament\Resources\Register\Bank;

use App\Models\Bank;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Checkbox;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Leandrocfe\FilamentPtbrFormFields\Cep;
use Filament\Forms\Components\ToggleButtons;
use Leandrocfe\FilamentPtbrFormFields\Document;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Register\Bank\BankResource\Pages;

class BankResource extends Resource
{
    protected static ?string $model = Bank::class;
    protected static ?string $modelLabel = 'Banco';
    protected static ?string $pluralModelLabel = 'Bancos';
    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationGroup = 'Cadastros';
    protected static ?string $navigationLabel = 'Bancos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make([
                    'default' => 1,
                ])
                    ->schema([
                        Tabs::make('Bank Register')
                            ->tabs([
                                Tabs\Tab::make('Basic')
                                    ->label('Basico')
                                    ->icon('heroicon-m-briefcase')
                                    ->schema([
                                        Section::make('')
                                            ->schema([
                                                Document::make('cnpj')->cnpj()->label('CNPJ'),
                                                TextInput::make('nome_banco')->label('Nome Banco'),
                                        ])->columns(2),
                                        Section::make('')
                                            ->schema([
                                                TextInput::make('codigo')->label('Codigo'),
                                                TextInput::make('agencia')->label('Agencia'),
                                                TextInput::make('dv_agencia')->label('Digito Agencia'),
                                                TextInput::make('conta')->label('Conta'),
                                                TextInput::make('dv_conta')->label('Digito Conta'),
                                                Select::make('coin_type')
                                                    ->label('Moeda')
                                                    ->options([
                                                        'BRL' => 'BRL (Reais BR)',
                                                        'USD' => 'USD (Dolar EUA)',
                                                        'EUR' => 'EUR (Euros)',
                                                    ])
                                        ])->columns(3),
                                    ]),
                                Tabs\Tab::make('Address')
                                    ->label('Endereço')
                                    ->icon('heroicon-m-building-office-2')
                                    ->schema([
                                        Section::make('')
                                            ->schema([
                                                Grid::make('')
                                                    ->schema([
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
                                                Hidden::make('siafi'),
                                            ])->columns(3),
                                    ]),
                                Tabs\Tab::make('Comunication')
                                    ->label('Tipo de Comunicação')
                                    ->icon('heroicon-m-chart-bar')
                                    ->schema([
                                        Section::make('')
                                            ->schema([
                                                Section::make('')
                                                ->schema([
                                                    TextInput::make('contato')->label('Nome Contato'),
                                                    TextInput::make('model_cnab')->label('Versão CNAB'),
                                                ])->columnSpan(1),
                                                Section::make('Comunicação:')
                                                    ->schema([
                                                        Checkbox::make('use_api')->label('Usar API'),
                                                        Checkbox::make('use_cnab')->label('Usar CNAB'),
                                                    ])->columnSpan(1),
                                            ])->columns(2),
                                        Section::make('')
                                            ->schema([
                                                TextInput::make('client_id')->label('Client ID'),
                                                TextInput::make('client_secret')->label('Client Secret'),
                                            ])->columns(2),
                                        Section::make('')
                                            ->schema([
                                                FileUpload::make('path_crt')->label('Arquivo CRT')
                                                    ->disk('local')
                                                    ->preserveFilenames()
                                                    ->visibility('private'),
                                                FileUpload::make('path_key')->label('Arquivo KEY')
                                                    ->disk('local')
                                                    ->preserveFilenames()
                                                    ->visibility('private')
                                            ])->columns(2),
                                    ]),
                                Tabs\Tab::make('Others')
                                    ->label('Outros')
                                    ->icon('heroicon-m-circle-stack')
                                    ->schema([
                                        Section::make('')
                                            ->schema([
                                                TextInput::make('fine')->label('Juros % A.M.')->numeric()->inputMode('decimal'),
                                                TextInput::make('interests')->label('Multa A.M')->numeric()->inputMode('decimal'),
                                                TextInput::make('wallet')->label('Carteira')->numeric()->length(3),
                                                ToggleButtons::make('protest')->label('Protestar?')->grouped()->boolean()->inline(),
                                                TextInput::make('days_protest')->label('Dias Protesto')->numeric(),
                                                ToggleButtons::make('blocked')->label('Bloqueado?')->grouped()->boolean()->inline()->visibleOn('edit'),
                                            ])->columns(3),
                                        Section::make('')
                                            ->schema([
                                                TextInput::make('default_message')->label('Mensagem Padrão 1'),
                                                TextInput::make('default_message2')->label('Mensagem Padrão 2'),
                                                TextInput::make('default_message3')->label('Mensagem Padrão 3'),
                                            ])->columns(3),
                                    ])
                            ])
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('codigo')
                    ->searchable()
                    ->sortable()
                    ->label('Código'),
                TextColumn::make('nome_banco')
                    ->searchable()
                    ->sortable()
                    ->label('Nome do Banco'),
                IconColumn::make('use_api')
                    ->boolean()
                    ->label('API'),
                IconColumn::make('use_cnab')
                    ->boolean()
                    ->label('CNAB'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListBanks::route('/'),
            'create' => Pages\CreateBank::route('/create'),
            'edit' => Pages\EditBank::route('/{record}/edit'),
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
