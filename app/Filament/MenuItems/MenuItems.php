<?php

namespace App\Filament\MenuItems;

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
}
