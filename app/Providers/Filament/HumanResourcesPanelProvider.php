<?php

namespace App\Providers\Filament;

use App\Filament\Colors\MyColors;
use App\Filament\MenuItems\MenuItems;
use App\Http\Middleware\ValidatePanelAccess;
use App\Modules\Admin\Settings\User\UserResource\Pages\EditProfile;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class HumanResourcesPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->topNavigation()
            ->id('humanResources')
            ->path('humanResources')
            ->userMenuItems(MenuItems::useMenuItems())
            ->databaseNotifications()
            ->profile(EditProfile::class, false)
            ->colors(MyColors::getColors())
            ->discoverResources(in: app_path('Modules/HumanResources'), for: 'App\\Modules\\HumanResources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Modules/HumanResources/Widgets'), for: 'App\\Modules\\HumanResources\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
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
                ValidatePanelAccess::class,
            ])
            ->plugins([])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
