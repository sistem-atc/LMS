<?php

namespace App\Providers\Filament;

use Filament\Panel;
use Filament\PanelProvider;
use App\Filament\Colors\MyColors;
use App\Http\ControlLoginResponse;
use Filament\Http\Middleware\Authenticate;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Filament\Http\Middleware\AuthenticateSession;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use App\Services\Utils\Towns\Interfaces\ExcludeSelectInterface;

class LoginPanelProvider extends PanelProvider implements ExcludeSelectInterface
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->bootUsing(fn() => app()->bind(LoginResponse::class, ControlLoginResponse::class))
            ->default()
            ->id('login')
            ->path('')
            ->login()
            ->colors(MyColors::getColors())
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);

    }

    public static function canAccess(): bool
    {
        return false;
    }
}
