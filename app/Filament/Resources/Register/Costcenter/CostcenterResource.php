<?php

namespace App\Filament\Resources\Register\Costcenter;

use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Costcenter;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\ToggleButtons;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Register\Costcenter\CostcenterResource\Pages;

class CostcenterResource extends Resource
{
    protected static ?string $model = Costcenter::class;
    protected static ?string $modelLabel = 'Centro de Custo';
    protected static ?string $pluralModelLabel = 'Centros de Custo';
    protected static ?string $navigationIcon = 'heroicon-o-queue-list';
    protected static ?string $navigationGroup = 'Cadastros';
    protected static ?string $navigationLabel = 'Centro de Custo';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('cost_center')
                    ->label('Centro de Custo')
                    ->required()
                    ->numeric(),
                TextInput::make('classification')
                    ->label('Classificação'),
                TextInput::make('description')
                    ->label('Descrição'),
                TextInput::make('email_approver')
                    ->label('Email Aprovador')
                    ->email(),
                ToggleButtons::make('blocked')
                    ->grouped()
                    ->boolean()
                    ->inline()
                    ->label('Bloqueado'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('cost_center')
                    ->label('Centro de Custo'),
                TextColumn::make('description')
                    ->label('Descrição'),
                IconColumn::make('blocked')
                    ->boolean()
                    ->label('Bloqueado')
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
            'index' => Pages\ListCostcenters::route('/'),
            'create' => Pages\CreateCostcenter::route('/create'),
            'edit' => Pages\EditCostcenter::route('/{record}/edit'),
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
