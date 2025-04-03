<?php

namespace App\Modules\Tms\DocumentFiscalCustomer;

use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Enums\ModFreightEnum;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use App\Models\DocumentFiscalCustomer;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Leandrocfe\FilamentPtbrFormFields\Money;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Modules\Tms\DocumentFiscalCustomer\DocumentFiscalCustomerResource\Pages;
use App\Models\CodeUf;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Get;
use Illuminate\Support\Collection;

class DocumentFiscalCustomerResource extends Resource
{
    protected static ?string $model = DocumentFiscalCustomer::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Operacional';
    protected static ?string $navigationLabel = 'Notas Fiscais Clientes';
    protected static ?string $modelLabel = 'Nota Fiscal';
    protected static ?string $pluralModelLabel = 'Notas Fiscais';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('')
                    ->schema([
                        TextInput::make('chNFe')
                            ->columnSpan(3)
                            ->label('Chave Nota Fiscal')
                            ->maxLength(44)
                            ->unique(ignoreRecord: true)
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(
                                function (Set $set, $state) {
                                    if ($state) {
                                        $set('cUF_id', CodeUf::where('code_uf', '=', substr($state, 0, 2))->pluck('federation_unit')->first());
                                        $set('mod', substr($state, 20, 2));
                                        $set('serie', abs(substr($state, 22, 3)));
                                        $set('nNF', abs(substr($state, 25, 9)));
                                    }
                                }
                            ),
                        TextInput::make('cUF_id')
                            ->label('Código da UF')
                            ->dehydrateStateUsing(fn(Get $get): string => substr($get('chNFe'), 0, 2))
                            ->readOnly()
                            ->columnSpan(2),
                        TextInput::make('mod')
                            ->label('Modelo')
                            ->columnSpan(1)
                            ->readOnly()
                            ->maxLength(3),
                        TextInput::make('nNF')
                            ->label('Numero NF')
                            ->columnSpan(2)
                            ->maxLength(16),
                        TextInput::make('serie')
                            ->label('Serie')
                            ->columnSpan(2)
                            ->maxLength(5),
                        DatePicker::make('dEmi')
                            ->label('Data Emissão')
                            ->columnSpan(2)
                            ->format('Y-m-d\TH:i:s'),
                    ])->columns(6),
                Section::make('')
                    ->schema([
                        Select::make('emit_customer_id')
                            ->label('Cliente Emitente')
                            ->relationship('emit_customer', 'company_name')
                            ->required(),
                        Select::make('sender_customer_id')
                            ->label('Cliente Remetente')
                            ->relationship('sender_customer', 'company_name')
                            ->required(),
                        Select::make('recipient_customer_id')
                            ->label('Cliente Destinatario')
                            ->relationship('recipient_customer', 'company_name')
                            ->required(),
                    ])->columns(2),
                Section::make('')
                    ->schema([
                        Money::make('vBC')
                            ->label('Valor Base de Calculo'),
                        Money::make('vICMS')
                            ->label('Valor ICMS'),
                        Money::make('vBCST')
                            ->label('Base de Calculo ST'),
                        Money::make('vST')
                            ->label('Valor ST'),
                        Money::make('vProd')
                            ->label('Valor Produtos'),
                        Money::make('vFrete')
                            ->label('Valor Frete'),
                        Money::make('vSeg')
                            ->label('Valor Seguro'),
                        Money::make('vDesc')
                            ->label('Valor Desconto'),
                    ])->columns(4),
                Section::make('')
                    ->schema([
                        Money::make('vIPI')
                            ->label('Valor IPI'),
                        Money::make('vPIS')
                            ->label('Valor PIS'),
                        Money::make('vCOFINS')
                            ->label('Valor COFINS'),
                        Money::make('vOutro')
                            ->label('Valor Outros'),
                        Money::make('vNF')
                            ->label('Valor NF'),
                        Select::make('modFrete')
                            ->label('Modalidade de Frete')
                            ->options(ModFreightEnum::class)
                            ->columnSpan(2),
                        TextInput::make('qVol')
                            ->label('Qtd Volumes')
                            ->numeric()
                            ->inputMode('decimal'),
                        TextInput::make('pesoL')
                            ->label('Peso Liquido')
                            ->numeric()
                            ->inputMode('decimal'),
                        TextInput::make('pesoB')
                            ->label('Peso Bruto')
                            ->numeric()
                            ->inputMode('decimal'),
                    ])->columns(5),
                Section::make('')
                    ->schema([
                        Textarea::make('infAdic')
                            ->label('Informações Adicionais')
                            ->columnSpanFull(),
                        FileUpload::make('xml')
                            ->label('Arquivo XML')
                            ->storeFiles(false)
                            ->minFiles(1)
                            ->maxFiles(1)
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nNF')
                    ->label('Numero NF')
                    ->searchable(),
                TextColumn::make('serie')
                    ->label('Serie')
                    ->searchable(),
                TextColumn::make('dEmi')
                    ->label('Data de Emissão')
                    ->dateTime('d/m/Y')
                    ->searchable(),
                TextColumn::make('sender_customer.company_name')
                    ->label('Cliente Remetente/Emitente')
                    ->sortable(),
                TextColumn::make('chNFe')
                    ->label('Chave NF')
                    ->searchable()
                    ->copyable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListDocumentFiscalCustomers::route('/'),
            'create' => Pages\CreateDocumentFiscalCustomer::route('/create'),
            'view' => Pages\ViewDocumentFiscalCustomer::route('/{record}'),
            'edit' => Pages\EditDocumentFiscalCustomer::route('/{record}/edit'),
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
