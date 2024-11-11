<?php

namespace App\Filament\Resources\Settings\Branch;

use ReflectionClass;
use App\Models\Branch;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Enums\TypeBranchEnum;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Illuminate\Support\Facades\File;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Filters\TrashedFilter;
use Leandrocfe\FilamentPtbrFormFields\Cep;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Services\Utils\Towns\Interfaces\ExcludeSelectInterface;
use App\Filament\Resources\Settings\Branch\BranchResource\Pages;

class BranchResource extends Resource
{
    protected static ?string $model = Branch::class;

    protected static ?string $modelLabel = 'Filial';

    protected static ?string $pluralModelLabel = 'Filiais';

    protected static ?string $navigationIcon = 'heroicon-o-building-library';

    protected static ?string $navigationGroup = 'Configurações';

    protected static ?string $navigationLabel = 'Filiais';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Grid::make()
                            ->schema([
                                TextInput::make('cnpj')
                                    ->mask('99.999.999/9999-99')
                                    ->label('CNPJ')
                                    ->columns(1),
                                TextInput::make('abbreviation')
                                    ->label('Sigla')
                                    ->columnSpan(1),
                                Select::make('type_branch')
                                    ->label('Tipo Empresa')
                                    ->options(TypeBranchEnum::class)
                                    ->live(onBlur: true)
                                    ->columnSpan(1),
                            ])
                            ->columns(3),
                        Grid::make()
                            ->schema([
                                TextInput::make('name')
                                    ->label('Razão Social')
                                    ->columnSpan(2),
                                TextInput::make('phantasy_name')
                                    ->label('Nome Fantasia')
                                    ->columnSpan(1),
                            ])->columns(3),
                    ])->columns(3),
                Section::make()
                    ->schema([
                        FileUpload::make('certificatePFX')
                            ->label('Certificado PFX')
                            ->disk('local')
                            ->directory('certificate')
                            ->visibility('private')
                            ->columnSpan(2)
                            ->preserveFilenames()
                            ->uploadingMessage('Importando certificado...')
                            ->panelLayout('integrated'),
                        TextInput::make('password_certificate')
                            ->label('Senha do Certificado')
                            ->password()
                            ->revealable(true)
                            ->columnSpan(1),
                    ])
                    ->visible(fn(Get $get): bool => $get('type_branch') == TypeBranchEnum::MATRIZ->getLabel())
                    ->columns(3),
                Section::make()
                    ->schema([
                        Select::make('branch_matriz')
                            ->label('Empresa Matriz')
                            ->relationship(
                                name: 'branch_matriz',
                                titleAttribute: 'name',
                                modifyQueryUsing: fn(Builder $query) => $query->where('type_branch', '=', TypeBranchEnum::MATRIZ),
                            )
                            ->columnSpan(2),
                    ])
                    ->visible(fn(Get $get): bool => $get('type_branch') == TypeBranchEnum::FILIAL->getLabel())
                    ->columns(3),
                Section::make()
                    ->schema([
                        TextInput::make('municipal_registration')->label('Incrição Municipal'),
                        TextInput::make('state_registration')->label('Incrição Estadual'),
                        Select::make('system_town')
                            ->label('Selecionar o sistema da Prefeitura')
                            ->options(fn() => self::getClassesTowns(app_path('Services/Towns')))
                    ])->columns(3),
                Section::make()
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
                        Grid::make()
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

    private static function getClassesTowns($folderPath): array
    {

        $classes = [];

        foreach (File::allFiles($folderPath) as $file) {
            $filePath = $file->getRealPath();
            $className = self::getClassNameFromFile($filePath);

            if ($className) {
                $reflection = new ReflectionClass($className);

                if (
                    !$reflection->isAbstract() &&
                    !$reflection->implementsInterface(ExcludeSelectInterface::class)
                ) {
                    $classes[$reflection->getName()] = $reflection->getShortName();
                }
            }
        }

        return $classes;
    }

    private static function getClassNameFromFile($filePath)
    {

        $content = file_get_contents($filePath);
        $namespace = '';
        $className = '';

        if (preg_match('/namespace\s+(.+?);/', $content, $matches)) {
            $namespace = $matches[1];
        }

        if (preg_match('/class\s+(\w+)/', $content, $matches)) {
            $className = $matches[1];
        }

        return $namespace ? $namespace . '\\' . $className : null;
    }
}
