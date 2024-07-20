<?php

namespace App\Filament\Resources\Operational\MultiSoftware;

use App\Filament\Resources\Operational\MultiSoftware\MultiSoftwareResource\Pages;
use App\Models\MultiSoftware;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MultiSoftwareResource extends Resource
{
    protected static ?string $model = MultiSoftware::class;
    protected static ?string $modelLabel = 'Multi Cte';
    protected static ?string $pluralModelLabel = 'Multi Ctes';
    protected static ?string $navigationIcon = 'heroicon-o-rss';

    protected static ?string $navigationGroup = 'Operacional';
    protected static ?string $navigationLabel = 'Multi Cte';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('Filial Origem')->required(),
            Forms\Components\TextInput::make('Numero Documento')->required(),
            Forms\Components\TextInput::make('Serie')->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Filial Origem'),
                Tables\Columns\TextColumn::make('Numero Documento'),
                Tables\Columns\TextColumn::make('Serie'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageMultiSoftware::route('/'),
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
