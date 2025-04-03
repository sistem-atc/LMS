<?php

namespace App\Filament\MenuItems;

use Filament\Facades\Filament;
use App\Filament\Pages\Settings;
use Filament\Navigation\MenuItem;

class MenuItems
{
    public static function useMenuItems(): array
    {
        return [
            MenuItem::make()
                ->label('Alterar Dados de Acesso')
                ->icon('carbon-branch')
                ->url(fn(): string => Settings::getUrl()),
        ];
    }

    public static function getPanelsAvaliables()
    {
        return collect(Filament::getPanels())
            ->mapWithKeys(
                function ($panel) {
                    $user = Filament::auth()->user();

                    return (
                        ($user->hasRole('super_admin') && $panel->getId() !== 'login') ||
                        ($panel->getId() !== 'login' && $user->hasPermissionTo($panel->getId()))
                    )
                        ? [$panel->getId() => ucfirst($panel->getId())]
                        : [];
                }
            );
    }
}
