<?php

namespace App\Providers\Filament;

use Filament\Panel;
use Filament\PanelProvider;
use Filament\Pages\Dashboard;
use App\Filament\Pages\Settings;
use App\Filament\Colors\MyColors;
use App\Filament\MenuItems\MenuItems;
use App\Interfaces\ExcludeSelectInterface;
use Filament\Http\Middleware\Authenticate;
use App\Http\Middleware\ValidatePanelAccess;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use App\Modules\Admin\Settings\User\UserResource\Pages\EditProfile;

abstract class BasePanelProvider extends PanelProvider implements ExcludeSelectInterface
{

    protected function baseConfig(Panel $panel): Panel
    {
        return $panel
            ->topNavigation()
            ->databaseNotifications()
            ->profile(EditProfile::class, false)
            ->userMenuItems(MenuItems::useMenuItems())
            ->plugins($this->usePlugins())
            ->colors(MyColors::getColors())
            ->pages([
                Dashboard::class,
                Settings::class,
            ])
            ->font('Nunito')
            ->middleware($this->useMiddleware())
            ->authMiddleware([
                Authenticate::class,
            ]);
    }

    private function usePlugins(): array
    {
        return [];
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
