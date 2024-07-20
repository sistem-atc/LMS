<?php

namespace App\Filament\Resources\Register\CodeUf;

use Filament\Forms;
use Filament\Tables;
use App\Models\CodeUf;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Register\CodeUf\CodeUfResource\Pages;

class CodeUfResource extends Resource
{
    protected static ?string $model = CodeUf::class;
    protected static ?string $modelLabel = 'Código UF';
    protected static ?string $pluralModelLabel = 'Código UFs';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Cadastros';
    protected static ?string $navigationLabel = 'Código UF';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('code_uf')
                    ->label('Código da UF')
                    ->maxLength(2)
                    ->numeric(),
                TextInput::make('federation_unit')
                    ->label('Unidade Federativa'),
                TextInput::make('uf')
                    ->label('UF')
                    ->maxLength(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code_uf')
                    ->label('Código da UF'),
                TextColumn::make('federation_unit')
                    ->label('Unidade Federativa'),
                TextColumn::make('uf')
                    ->label('UF'),
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
            'index' => Pages\ListCodeUfs::route('/'),
            'create' => Pages\CreateCodeUf::route('/create'),
            'edit' => Pages\EditCodeUf::route('/{record}/edit'),
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
