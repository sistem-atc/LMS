<?php

namespace App\Modules\Tms\Lot;

use App\Models\Lot;
use Filament\Tables;
use App\Enums\LotEnum;
use App\Models\Branch;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use App\Modules\Tms\Lot\LotResource\Pages;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\CheckboxList;
use App\Utils\Tms\CalculateTransportDocument;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Modules\Tms\Lot\LotResource\Pages\SuportFunctions;

class LotResource extends Resource
{
    protected static ?string $model = Lot::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Operacional';
    protected static ?string $navigationLabel = 'Lotes Pré CTes';
    protected static ?string $modelLabel = 'Lote';
    protected static ?string $pluralModelLabel = 'Lotes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Dados do Lote')->schema(self::LotData())->columns(2),
                    Wizard\Step::make('Selecionar Notas Fiscais')->schema(self::SelectFiscalNotes()),
                    Wizard\Step::make('Resumo do Lote')->schema(self::getResumeLot()),
                ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->searchable()
                    ->sortable()
                    ->label('Numero do Lote'),
                TextColumn::make('branche.abbreviation')
                    ->searchable()
                    ->sortable()
                    ->label('Filial Origem'),
                TextColumn::make('status')
                    ->searchable()
                    ->sortable()
                    ->label('Estado do Lote'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                ActionGroup::make([
                    Action::make('calculate')
                        ->label('Gerar CT-e')
                        ->accessSelectedRecords()
                        ->requiresConfirmation()
                        ->icon('fluentui-document-queue-add-20')
                        ->modalIcon('fluentui-document-queue-add-20')
                        ->color('success')
                        ->modalHeading('Gerar CT-e')
                        ->modalDescription('Favor confirmar os dados para geração do CT-e')
                        ->modalSubmitActionLabel('Sim, processar!')
                        ->action(function (Model $record) {
                            Pages\SuportFunctions::generate($record);
                        }),
                    Action::make('reverse')
                        ->label('Estornar Lote')
                        ->accessSelectedRecords()
                        ->requiresConfirmation()
                        ->icon('heroicon-o-exclamation-triangle')
                        ->modalIcon('heroicon-o-exclamation-triangle')
                        ->color('danger')
                        ->modalHeading('Estornar lote')
                        ->modalDescription('Lote só poderá ser estornado caso não tenha um CT-e vinculado.')
                        ->modalSubmitActionLabel('Sim, estornar!')
                        ->action(function (Model $record) {
                            Pages\SuportFunctions::reverse($record);
                        })
                        ->disabled(true),
                ])->iconButton(),
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
            'index' => Pages\ListLots::route('/'),
            'create' => Pages\CreateLot::route('/create'),
            'view' => Pages\ViewLot::route('/{record}'),
            'edit' => Pages\EditLot::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getResumeLot(): array
    {
        return [
            Grid::make(3)
                ->label('')
                ->schema([
                    Placeholder::make('Valor Total das Mercadorias')
                        ->content(fn(Get $get) => 'R$ ' . number_format(SuportFunctions::totalValueNF($get), 2, ',', '.')),
                    Placeholder::make('Peso Total das Mercadorias')
                        ->content(fn(Get $get) => number_format(SuportFunctions::weightTotal($get), 3, ',', '.')),
                    Placeholder::make('Quantidade de Notas')
                        ->content(fn(Get $get) => SuportFunctions::qtdNF($get)),
                    Placeholder::make('Valor do Frete')
                        ->content(
                            fn(Get $get) =>
                            'R$ ' .
                            number_format(
                                CalculateTransportDocument::calculate(
                                    collect($get('document_fiscal_customer_id'))
                                ),
                                2,
                                ',',
                                '.'
                            )
                        ),
                ])
        ];

    }

    public static function SelectFiscalNotes(): array
    {
        return [
            CheckboxList::make('document_fiscal_customer_id')
                ->label('Notas Fiscais')
                ->options(fn(?Lot $record, string $operation) => SuportFunctions::optionsCheckBoxList($record, $operation))
                ->default(fn(?Lot $record) => SuportFunctions::defaultOptionsCheckBoxList($record))
                ->required()
                ->searchable()
                ->bulkToggleable()
                ->columns(2),
        ];
    }

    public static function LotData(): array
    {

        return [
            Select::make('branche_id')
                ->label('Filial Origem')
                ->searchable()
                ->preload()
                ->options(
                    fn() => Filament::auth()->user()->branch_logged['type_branche'] === 'Matriz'
                    ? Branch::all()->pluck('abbreviation', 'id')->toArray()
                    : Branch::where('id', '=', Filament::auth()->user()->branch_logged['id'])
                        ->pluck('abbreviation', 'id')->toArray()
                ),
            TextInput::make('collection_request')
                ->label('Solicitação de Coleta')
                ->numeric(),
            TextInput::make('status')
                ->label('Estado do Lote')
                ->default(LotEnum::DIGITAÇÃO)
                ->readOnly(),
            TextInput::make('quotation')
                ->label('Cotação')
                ->numeric(),
        ];

    }
}
