<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class SalesPanelProvider extends BasePanelProvider
{
    public function panel(Panel $panel): Panel
    {
        $panel = $panel
            ->id('Comercial')
            ->path('sales')
            ->discoverResources(in: app_path('Modules/Sales'), for: 'App\\Modules\\Sales')
            ->discoverWidgets(in: app_path('Filament/Sales/Widgets'), for: 'App\\Modules\\Sales\\Widgets')
            ->discoverPages(in: app_path('Modules/Sales/Pages'), for: 'App\\Modules\\Sales\\Pages');

        return $this->baseConfig($panel);
    }
}
