<?php

namespace App\Filament\Resources\Operational;

use App\Models\Lot;
use Filament\Tables;
use App\Models\Branch;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Operational\LotResource\Pages;

class LotResource extends Resource
{
    protected static ?string $model = Lot::class;
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
                            Select::make('origin_branch_id')
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
                                ->numeric(''),
                            TextInput::make('status')
                                ->label('Estado do Lote')
                                ->default('Em Digitação')
                                ->disabled(),
                            TextInput::make('quotation')
                                ->label('Cotação')
                                ->numeric(''),
                        ])->columns(2),
                    Wizard\Step::make('Inserir Notas Fiscais')
                        ->schema([
                            Repeater::make('members')
                                ->schema([
                                    TextInput::make('cNF')->label('Numero Nota'),
                                    TextInput::make('mod')->label('Modelo'),
                                    TextInput::make('cUF')->label('UF'),
                                    TextInput::make('serie')->label('Serie'),
                                    TextInput::make('nNF')->label('Numero Nota'),
                                    TextInput::make('dEmi')->label('Data Emissão'),
                                    TextInput::make('vBC')->label('Base de Calculo'),
                                    TextInput::make('vICMS')->label('Valor ICMS'),
                                    TextInput::make('vBCST')->label('Valor Base ST'),
                                    TextInput::make('vST'),
                                    TextInput::make('vProd'),
                                    TextInput::make('vFrete'),
                                    TextInput::make('vSeg'),
                                    TextInput::make('vDesc'),
                                    TextInput::make('vIPI'),
                                    TextInput::make('vPIS'),
                                    TextInput::make('vCOFINS'),
                                    TextInput::make('vOutro'),
                                    TextInput::make('vNF'),
                                    TextInput::make('modFrete'),
                                    TextInput::make('qVol'),
                                    TextInput::make('pesoL'),
                                    TextInput::make('pesoB'),
                                    TextInput::make('infAdic'),
                                    TextInput::make('chNFe'),
                                ])->columns(4),
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
                TextColumn::make('origin_branch.abbreviation')
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
                    ->color('info')
                    ->action(function (Model $record) {
                        LotResource\Pages\SuportFunctions::generate($record);
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
