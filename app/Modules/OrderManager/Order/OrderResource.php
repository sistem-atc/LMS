<?php

namespace App\Modules\OrderManager\Order;

use App\Modules\OrderManager\Order\OrderResource\Pages;
use App\Modules\OrderManager\Order\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('local_expedicao_recebimento')
                    ->maxLength(255),
                Forms\Components\TextInput::make('centro')
                    ->maxLength(255),
                Forms\Components\TextInput::make('numero_transporte')
                    ->maxLength(255),
                Forms\Components\TextInput::make('placa_veiculo')
                    ->maxLength(255),
                Forms\Components\TextInput::make('transportador')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nome_transportador')
                    ->maxLength(255),
                Forms\Components\TextInput::make('regiao')
                    ->maxLength(255),
                Forms\Components\TextInput::make('itinerario')
                    ->maxLength(255),
                Forms\Components\Textarea::make('descricao_itinerario')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('cidade')
                    ->maxLength(255),
                Forms\Components\TextInput::make('remessa')
                    ->maxLength(255),
                Forms\Components\TextInput::make('status_expedicao')
                    ->maxLength(255),
                Forms\Components\TextInput::make('recebedor_mercadoria')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nome_recebedor_mercadoria')
                    ->maxLength(255),
                Forms\Components\TextInput::make('emissor_ordem')
                    ->maxLength(255),
                Forms\Components\TextInput::make('material')
                    ->maxLength(255),
                Forms\Components\Textarea::make('descricao')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('peso_bruto')
                    ->numeric(),
                Forms\Components\TextInput::make('peso_liquido')
                    ->numeric(),
                Forms\Components\TextInput::make('usuario')
                    ->maxLength(255),
                Forms\Components\TextInput::make('grupo_transporte')
                    ->maxLength(255),
                Forms\Components\TextInput::make('denominacao')
                    ->maxLength(255),
                Forms\Components\TextInput::make('organizacao_vendas')
                    ->maxLength(255),
                Forms\Components\TextInput::make('setor_atividade')
                    ->maxLength(255),
                Forms\Components\TextInput::make('prioridade_remessa')
                    ->maxLength(255),
                Forms\Components\TextInput::make('hora'),
                Forms\Components\TextInput::make('item')
                    ->numeric(),
                Forms\Components\TextInput::make('denominacao_item')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('data_remessa'),
                Forms\Components\DatePicker::make('data_criacao'),
                Forms\Components\DateTimePicker::make('saida_mrc_plan'),
                Forms\Components\DatePicker::make('data_limite'),
                Forms\Components\TextInput::make('desvio')
                    ->maxLength(255),
                Forms\Components\TextInput::make('grupo_atendimento')
                    ->maxLength(255),
                Forms\Components\TextInput::make('incoterms')
                    ->maxLength(255),
                Forms\Components\Textarea::make('instrucoes_entrega')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('created_by')
                    ->numeric(),
                Forms\Components\TextInput::make('updated_by')
                    ->numeric(),
                Forms\Components\TextInput::make('deleted_by')
                    ->numeric(),
                Forms\Components\TextInput::make('restored_by')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('local_expedicao_recebimento')
                    ->searchable(),
                Tables\Columns\TextColumn::make('centro')
                    ->searchable(),
                Tables\Columns\TextColumn::make('numero_transporte')
                    ->searchable(),
                Tables\Columns\TextColumn::make('placa_veiculo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('transportador')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nome_transportador')
                    ->searchable(),
                Tables\Columns\TextColumn::make('regiao')
                    ->searchable(),
                Tables\Columns\TextColumn::make('itinerario')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cidade')
                    ->searchable(),
                Tables\Columns\TextColumn::make('remessa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status_expedicao')
                    ->searchable(),
                Tables\Columns\TextColumn::make('recebedor_mercadoria')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nome_recebedor_mercadoria')
                    ->searchable(),
                Tables\Columns\TextColumn::make('emissor_ordem')
                    ->searchable(),
                Tables\Columns\TextColumn::make('material')
                    ->searchable(),
                Tables\Columns\TextColumn::make('peso_bruto')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('peso_liquido')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('usuario')
                    ->searchable(),
                Tables\Columns\TextColumn::make('grupo_transporte')
                    ->searchable(),
                Tables\Columns\TextColumn::make('denominacao')
                    ->searchable(),
                Tables\Columns\TextColumn::make('organizacao_vendas')
                    ->searchable(),
                Tables\Columns\TextColumn::make('setor_atividade')
                    ->searchable(),
                Tables\Columns\TextColumn::make('prioridade_remessa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('hora'),
                Tables\Columns\TextColumn::make('item')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('denominacao_item')
                    ->searchable(),
                Tables\Columns\TextColumn::make('data_remessa')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('data_criacao')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('saida_mrc_plan')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('data_limite')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('desvio')
                    ->searchable(),
                Tables\Columns\TextColumn::make('grupo_atendimento')
                    ->searchable(),
                Tables\Columns\TextColumn::make('incoterms')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_by')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_by')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deleted_by')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('restored_by')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
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
