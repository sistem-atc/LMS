<?php

namespace App\Providers\Filament;

use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use App\Filament\Colors\MyColors;
use App\Filament\MenuItems\MenuItems;
use App\Http\Middleware\ValidatePanelAccess;
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
use App\Modules\Admin\Settings\User\UserResource\Pages\EditProfile;

class AdminPanelProvider extends PanelProvider
{

    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('admin')
            ->path('admin')
            ->databaseNotifications()
            ->profile(EditProfile::class, false)
            ->userMenuItems(MenuItems::useMenuItems())
            ->plugins($this->usePlugins())
            ->colors(MyColors::getColors())
            ->discoverResources(in: app_path('Modules/Admin'), for: 'App\\Modules\\Admin')
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
            ValidatePanelAccess::class,
        ];
    }
}
