<?php

namespace App\Modules\Admin\Settings\User;

use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Forms\Components\Grid;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use App\Modules\Admin\Settings\User\UserResource\Pages;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $modelLabel = 'Usuário';
    protected static ?string $pluralModelLabel = 'Usuários';
    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationGroup = 'Configurações';
    protected static ?string $navigationLabel = 'Usuários';


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
                        Toggle::make('is_active')
                            ->label('Ativo')
                            ->default(true)
                            ->inline()
                            ->onColor('success')
                            ->offColor('danger')
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
                IconColumn::make('is_active')
                    ->boolean()
                    ->falseIcon('heroicon-o-x-mark')
                    ->label('Ativo'),
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
                        function (User $record): Notification {
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
            ->bulkActions([]);
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
            ->withoutGlobalScopes([]);
    }
}
