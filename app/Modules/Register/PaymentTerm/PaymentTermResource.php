<?php

namespace App\Modules\Register\PaymentTerm;

use App\Enums\TypeFreightEnum;
use App\Enums\WeekdayEnum;
use App\Modules\Register\PaymentTerm\PaymentTermResource\Pages;
use App\Models\PaymentTerm;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaymentTermResource extends Resource
{
    protected static ?string $model = PaymentTerm::class;
    protected static ?string $modelLabel = 'Prazo de Pagamento';
    protected static ?string $pluralModelLabel = 'Prazos de Pagamentos';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Cadastros';
    protected static ?string $navigationLabel = 'Prazos de Pagamentos';


    public static function form(Form $form): Form
    {
        return $form
            ->schema(self::paymentForm());
    }

    public static function paymentForm(): array
    {

        return [
            TextInput::make('name')
                ->label('Nome'),
            Select::make('type_freight')
                ->label('Tipo de Frete')
                ->multiple()
                ->options(TypeFreightEnum::class),
            Select::make('weekday')
                ->label('Dia da Semana')
                ->multiple()
                ->options(WeekdayEnum::class),
            Select::make('especific_date')
                ->label('Dias Especificos')
                ->multiple()
                ->options(
                    function (): array {
                        $days = [];
                        for ($i = 1; $i <= 31; $i++) {
                            $days[] = $i;
                        };

                        return $days;
                    }
                ),
            TextInput::make('term')
                ->label('Prazo'),
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nome'),
                TextColumn::make('type_freight')
                    ->label('Tipo de Frete'),
                TextColumn::make('term')
                    ->label('Prazo'),
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
            'index' => Pages\ListPaymentTerms::route('/'),
            'create' => Pages\CreatePaymentTerm::route('/create'),
            'edit' => Pages\EditPaymentTerm::route('/{record}/edit'),
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
