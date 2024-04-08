<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Employee;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Leandrocfe\FilamentPtbrFormFields\Cep;
use App\Filament\Resources\EmployeeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EmployeeResource\RelationManagers;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Recursos Humanos';
    protected static ?string $navigationLabel = 'Funcionários';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()
                ->schema([
                   Tabs::make('Employee Register')
                   ->tabs([
                        Tabs\Tab::make('Basic')
                            ->icon('heroicon-m-bell')
                            ->columns(2)
                            ->schema([
                                TextInput::make('name')
                                    ->required(),
                                TextInput::make('cpf')
                                    ->label('CPF')
                                    ->required(),
                                Select::make('branch_id')
                                    ->label('Filial')
                                    ->searchable()
                                    ->preload()
                                    ->relationship('branch', 'abbreviation')
                            ]),
                        Tabs\Tab::make('Address')
                            ->icon('heroicon-m-bell')
                            ->columns(2)
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
                            ])
                   ]),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
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
