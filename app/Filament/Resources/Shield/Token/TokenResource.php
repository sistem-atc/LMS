<?php

namespace App\Filament\Resources\Shield\Token;

use App\Models\User;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\Shield\Token\TokenResource\Pages;
use Rupadana\ApiService\Resources\TokenResource as ResourcesTokenResource;

class TokenResource extends ResourcesTokenResource
{
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('General')
                    ->schema([
                        TextInput::make('Name')
                            ->required(),
                        Select::make('tokenable_id')
                            ->options(User::all()->pluck('name', 'id'))
                            ->label('User')
                            ->hidden(function () {
                                $user = auth()->user();

                                return ! $user->hasRole('super_admin');
                            })
                            ->required(),
                    ]),

                Section::make('Abilities')
                    ->description('Select abilities of the token')
                    ->schema(static::getAbilitiesSchema()),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTokens::route('/'),
            'create' => Pages\CreateToken::route('/create'),
            'edit' => Pages\EditToken::route('/{record}/edit'),
        ];
    }
}
