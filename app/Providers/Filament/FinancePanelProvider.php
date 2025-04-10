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

class FinancePanelProvider extends PanelProvider
{

    public function panel(Panel $panel): Panel
    {
        return $panel
            ->topNavigation()
            ->id('Financeiro')
            ->path('finance')
            ->databaseNotifications()
            ->userMenuItems(MenuItems::useMenuItems())
            ->profile(EditProfile::class, false)
            ->colors(MyColors::getColors())
            ->discoverResources(in: app_path('Modules/Finance'), for: 'App\\Modules\\Finance')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Modules/Finance/Widgets'), for: 'App\\Modules\\Finance\\Widgets')
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
