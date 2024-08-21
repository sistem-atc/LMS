<?php

namespace App\Filament\Resources\Operational\Lot;

use App\Models\Lot;
use Filament\Tables;
use App\Models\Branch;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\DB;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use App\Models\DocumentFiscalCustomer;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\CheckboxList;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Operational\Lot\LotResource\Pages;
use Illuminate\Support\Collection;

use function PHPUnit\Framework\isNull;

class LotResource extends Resource
{
    protected static ?string $model = Lot::class;
    protected static ?string $modelLabel = 'Lote';
    protected static ?string $pluralModelLabel = 'Lotes';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Operacional';
    protected static ?string $navigationLabel = 'Lotes Pré CTes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Dados do Lote')
                        ->schema([
                            Select::make('branche_id')
                                ->label('Filial Origem')
                                ->searchable()
                                ->preload()
                                ->options(
                                    fn() => Filament::auth()->user()->branch_logged['type_branche'] === 'Matriz'
                                        ? Branch::all()->pluck('abbreviation', 'id')->toArray()
                                        : Branch::where('id','=',Filament::auth()->user()->branch_logged['id'])
                                                    ->pluck('abbreviation', 'id')->toArray()
                                ),
                            TextInput::make('collection_request')
                                ->label('Solicitação de Coleta')
                                ->numeric(),
                            TextInput::make('status')
                                ->label('Estado do Lote')
                                ->default('Em Digitação')
                                ->readOnly(),
                            TextInput::make('quotation')
                                ->label('Cotação')
                                ->numeric(),
                        ])->columns(2),
                    Wizard\Step::make('Selecionar Notas Fiscais')
                        ->schema([
                            CheckboxList::make('document_fiscal_customer_id')
                                ->label('Notas Fiscais')
                                ->options(function(?Lot $record): Collection{
                                    if (!is_null($record)){
                                        if ($record->exists){
                                            return DocumentFiscalCustomer::where('lot_id', '=', $record->id)
                                                ->orWhere('lot_id', null)
                                                ->get()
                                                ->mapWithKeys(fn ($item): array => [$item->id => $item->nNF . ' ' . $item->emit_customer->company_name]);
                                        }
                                    }
                                        return DocumentFiscalCustomer::whereNull('lot_id')
                                            ->get()
                                            ->mapWithKeys(fn ($item): array => [$item->id => $item->nNF . ' ' . $item->emit_customer->company_name]);
                                    }
                                )
                                ->default(function (?Lot $record) {
                                    if (!is_null($record)){
                                        if($record->exists){
                                            return $record->documentFiscalCustomer->pluck('id')->toArray();
                                        }
                                    };
                                })
                                ->required()
                        ]),
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
                Action::make('calculate')
                    ->accessSelectedRecords()
                    ->icon('heroicon-m-arrow-path')
                    ->action(function (Model $record) {
                        Pages\SuportFunctions::generate($record);
                    }),
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
            'index' => Pages\ListLots::route('/'),
            'create' => Pages\CreateLot::route('/create'),
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
}
