<?php

namespace App\Providers\Filament;

use Filament\Panel;
use App\Http\ControlLoginResponse;
use App\Interfaces\ExcludeSelectInterface;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;

class LoginPanelProvider extends BasePanelProvider implements ExcludeSelectInterface
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->bootUsing(fn() => app()->bind(LoginResponse::class, ControlLoginResponse::class))
            ->default()
            ->id('login')
            ->path('')
            ->login();
    }

    public static function canAccess(): bool
    {
        return false;
    }
}
