<?php

namespace App\Filament\Resources\Settings\EdiPattern;

use App\Enums\TypeEdiEnum;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\EdiPattern;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Settings\EdiPattern\EdiPatternResource\Pages;
use Filament\Forms\Components\Select;

class EdiPatternResource extends Resource
{
    protected static ?string $model = EdiPattern::class;
    protected static ?string $modelLabel = 'Padrão EDI';
    protected static ?string $pluralModelLabel = 'Padrões EDIs';
    protected static ?string $navigationIcon = 'heroicon-o-building-library';
    protected static ?string $navigationGroup = 'Configurações';
    protected static ?string $navigationLabel = 'Padrão EDI';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nome')
                    ->columnSpanFull(),
                Repeater::make('group')
                    ->label('Grupo')
                    ->schema([
                        Select::make('type')
                            ->options(TypeEdiEnum::class),
                        Repeater::make('schema')
                            ->label('Schema')
                            ->schema(self::getSchemaDetails())
                            ->collapsed()
                            ->reorderableWithButtons()
                            ->itemLabel(fn (array $state): ?string => $state['Nome'] ?? null)
                            ->columnSpanFull(),
                    ])
                    ->itemLabel(fn (array $state): ?string => $state['type'] ?? null)
                    ->collapsible()
                    ->collapsed()
                    ->columnSpanFull()
                    ->defaultItems(2)
                    ->grid(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nome')
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

    public static function getSchemaDetails(): array
    {
        return [
            Grid::make()
                ->schema([
                    TextInput::make('Nome')
                        ->required()
                        ->columnSpan(1),
                    TextInput::make('Posição Inicial')
                        ->integer()
                        ->required()
                        ->minValue(0)
                        ->columnSpan(1),
                    TextInput::make('Posição Final')
                        ->integer()
                        ->required()
                        ->minValue(0)
                        ->columnSpan(1) ,
                ])->columns(3)
        ];
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
            'index' => Pages\ListEdiPatterns::route('/'),
            'create' => Pages\CreateEdiPattern::route('/create'),
            'edit' => Pages\EditEdiPattern::route('/{record}/edit'),
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
