<?php

namespace App\Filament\Resources\Settings\UserResource;

use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Forms\Components\Grid;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Settings\UserResource\Pages;
use Filament\Notifications\Notification;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationGroup = 'Configurações';
    protected static ?string $navigationLabel = 'Usuarios';


    public static function form(Form $form): Form
    {
        return  $form
            ->schema([
                Grid::make()
                ->schema([
                    TextInput::make('email')
                    ->email()
                    ->required(),
                    TextInput::make('password')
                        ->password()
                        ->required()
                        ->visibleOn('create'),
                    Select::make('roles')
                        ->multiple()
                        ->searchable()
                        ->preload()
                        ->relationship('roles', 'name'),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('employee.name'),
                TextColumn::make('email'),
                TextColumn::make('employee.branch.abbreviation')->label('Filial'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('ResetPassword')
                    ->label('Reset Password')
                    ->icon('carbon-password')
                    ->color(Color::Blue)
                    ->requiresConfirmation()
                    ->action(
                        function(User $record): Notification {
                            User::find($record->id)->update([
                                'password' => config('domain.defaultPass'),
                            ]);
                            return Notification::make()
                                ->title('Senha Alterada para o Padrão do sistema.')
                                ->success()
                                ->send();
                        }
                    ),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
            ]);
    }

}
