<?php

namespace App\Providers\Filament;

use Filament\Panel;

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
