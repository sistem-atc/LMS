<?php

namespace App\Filament\Resources\Register;

use Filament\Tables;
use App\Models\Route;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\Register\RouteResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;

class RouteResource extends Resource
{
    protected static ?string $model = Route::class;
    protected static ?string $navigationIcon = 'heroicon-o-share';
    protected static ?string $navigationGroup = 'Cadastros';
    protected static ?string $navigationLabel = 'Rotas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('')
                    ->schema([
                        TextInput::make('name')->label('Nome'),
                    ])->columns(2),
                Section::make('')
                    ->schema([
                        Select::make('origin_branch_id')
                            ->label('Filial Origem')
                            ->searchable()
                            ->preload()
                            ->relationship('origin_branch', 'city'),
                        Select::make('recipient_branch_id')
                            ->label('Filial Destino')
                            ->searchable()
                            ->preload()
                            ->relationship('recipient_branch', 'city'),
                    ])->columns(2),
                Section::make('')
                    ->schema([
                        Toggle::make('active')
                            ->label('Ativo'),
                        Toggle::make('municipal_route')
                            ->label('Rota Municipal'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nome'),
                TextColumn::make('origin_branch.city')->label('Filial Origem'),
                TextColumn::make('recipient_branch.city')->label('Filial Destino'),
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
            'index' => Pages\ListRoutes::route('/'),
            'create' => Pages\CreateRoute::route('/create'),
            'edit' => Pages\EditRoute::route('/{record}/edit'),
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
