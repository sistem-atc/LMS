<?php

namespace App\Filament\Resources\Settings;

use App\Enums\TypeBranchEnum;
use App\Models\Branch;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TrashedFilter;
use Leandrocfe\FilamentPtbrFormFields\Cep;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Leandrocfe\FilamentPtbrFormFields\Document;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Settings\BranchResource\Pages;
use Filament\Forms\Components\Select;

class BranchResource extends Resource
{
    protected static ?string $model = Branch::class;
    protected static ?string $navigationIcon = 'heroicon-o-building-library';
    protected static ?string $navigationGroup = 'Configurações';
    protected static ?string $navigationLabel = 'Filiais';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('')
                    ->schema([
                        TextInput::make('cnpj')->mask('99.999.999/9999-99')->label('CNPJ')->columns(1),
                        TextInput::make('abbreviation')->label('Sigla')->columnSpan(1),
                        TextInput::make('name')->label('Razão Social')->columnSpan(2),
                        Select::make('type_branch')
                            ->label('Tipo Empresa')
                            ->options(TypeBranchEnum::class)
                            ->columnSpan(1),
                    ])->columns(3),
                Section::make('')
                    ->schema([
                        TextInput::make('municipal_registration')->label('Incrição Municipal'),
                        TextInput::make('state_registration')->label('Incrição Estadual'),
                    ])->columns(2),
                Section::make('')
                    ->schema([
                        Section::make('')->schema([
                            Cep::make('postal_code')
                                ->label('CEP')
                                ->viaCep(
                                    mode: 'prefix',
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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('abbreviation')
                    ->label('Sigla'),
                TextColumn::make('name')
                    ->label('Razão Social'),
                TextColumn::make('cnpj')
                    ->label('CNPJ'),
                TextColumn::make('city')
                    ->label('Cidade'),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                    BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
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
            'index' => Pages\ListBranches::route('/'),
            'create' => Pages\CreateBranch::route('/create'),
            'edit' => Pages\EditBranch::route('/{record}/edit'),
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
