<?php

namespace App\Providers\Filament;

use App\Filament\Colors\MyColors;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use App\Filament\MenuItems\MenuItems;
use App\Filament\Hooks\ConfigRenderHook;
use App\Filament\Hooks\FavoriteRenderHook;
use Filament\Http\Middleware\Authenticate;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use App\Filament\Resources\Settings\User\UserResource\Pages\EditProfile;
use App\Http\ControlLoginResponse;
use Filament\Http\Responses\Auth\LoginResponse;

class AdminPanelProvider extends PanelProvider
{

    public function panel(Panel $panel): Panel
    {
        return $panel
            ->bootUsing(fn() => app()->bind(LoginResponse::class, ControlLoginResponse::class))
            ->default()
            ->brandName('LMS')
            ->brandLogo(asset('images/W-LogoLMS.png'))
            ->darkModeBrandLogo(asset('images/D-LogoLMS.png'))
            ->brandLogoHeight('3.5rem')
            ->favicon(asset('images/favicon.ico'))
            ->sidebarFullyCollapsibleOnDesktop()
            ->id('admin')
            ->path('admin')
            ->login()
            ->databaseNotifications()
            ->profile(EditProfile::class, false)
            ->userMenuItems(MenuItems::useMenuItems())
            ->plugins($this->usePlugins())
            ->colors(MyColors::getColors())
            ->renderHook(ConfigRenderHook::getPosition(), fn() => ConfigRenderHook::getView())
            ->renderHook(FavoriteRenderHook::getPosition(), fn() => FavoriteRenderHook::getView())
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([])
            ->viteTheme('resources/css/filament/lms/theme.css')
            ->font('Nunito')
            ->middleware($this->useMiddleware())
            ->authMiddleware([
                Authenticate::class,
            ]);
    }

    private function usePlugins(): array
    {
        return [
            FilamentShieldPlugin::make()
        ];
    }

    private function useMiddleware(): array
    {
        return [
            EncryptCookies::class,
            AddQueuedCookiesToResponse::class,
            StartSession::class,
            AuthenticateSession::class,
            ShareErrorsFromSession::class,
            VerifyCsrfToken::class,
            SubstituteBindings::class,
            DisableBladeIconComponents::class,
            DispatchServingFilamentEvent::class,
        ];
    }
}
