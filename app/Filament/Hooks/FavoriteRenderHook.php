<?php

namespace App\Filament\Hooks;

use Filament\View\PanelsRenderHook;
use Illuminate\Support\Facades\Blade;

class FavoriteRenderHook
{

    public static function getPosition(): string
    {
        return PanelsRenderHook::USER_MENU_BEFORE;
    }

    public static function getView(): string
    {

        return Blade::render('@livewire(\'topbar.favorite-resources\')');
    }
}
