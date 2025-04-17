<?php

namespace App\Providers\Filament;

use Filament\Panel;

class TaxPanelProvider extends BasePanelProvider
{
    public function panel(Panel $panel): Panel
    {
        $panel = $panel
            ->id('Fiscal')
            ->path('tax')
            ->discoverResources(in: app_path('Modules/Tax'), for: 'App\\Modules\\Tax')
            ->discoverWidgets(in: app_path('Filament/Tax/Widgets'), for: 'App\\Modules\\Tax\\Widgets')
            ->discoverPages(in: app_path('Modules/Tax/Pages'), for: 'App\\Modules\\Tax\\Pages');

        return $this->baseConfig($panel);

    }
}
