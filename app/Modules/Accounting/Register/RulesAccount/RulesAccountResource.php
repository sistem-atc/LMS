<?php

namespace App\Modules\Accounting\Register\RulesAccount;

use App\Modules\Accounting\Register\RulesAccount\RulesAccountResource\Pages;
use App\Modules\Accounting\Register\RulesAccount\RulesAccountResource\RelationManagers;
use App\Models\RulesAccount;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RulesAccountResource extends Resource
{
    protected static ?string $model = RulesAccount::class;
    protected static ?string $modelLabel = 'Regra de Conta';
    protected static ?string $pluralModelLabel = 'Regras de Contas';
    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-bar';
    protected static ?string $navigationGroup = 'Cadastros';
    protected static ?string $navigationLabel = 'Regras de Contas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListRulesAccounts::route('/'),
            'create' => Pages\CreateRulesAccount::route('/create'),
            'edit' => Pages\EditRulesAccount::route('/{record}/edit'),
        ];
    }
}
