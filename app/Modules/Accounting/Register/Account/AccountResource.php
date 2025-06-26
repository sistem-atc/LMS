<?php

namespace App\Modules\Accounting\Register\Account;

use App\Modules\Accounting\Register\Account\AccountResource\Pages;
use App\Modules\Accounting\Register\Account\AccountResource\RelationManagers;
use App\Models\Account;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AccountResource extends Resource
{
    protected static ?string $model = Account::class;
    protected static ?string $modelLabel = 'Conta Contábel';
    protected static ?string $pluralModelLabel = 'Contas Contábeis';
    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-bar';
    protected static ?string $navigationGroup = 'Cadastros';
    protected static ?string $navigationLabel = 'Contas Contábeis';

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
            'index' => Pages\ListAccounts::route('/'),
            'create' => Pages\CreateAccount::route('/create'),
            'edit' => Pages\EditAccount::route('/{record}/edit'),
        ];
    }
}
