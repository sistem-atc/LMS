<?php

namespace App\Providers\Filament;

use Filament\Panel;

class TaxPanelProvider extends BasePanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('Fiscal')
            ->path('tax')
            ->discoverResources(in: app_path('Modules/Tax'), for: 'App\\Modules\\Tax')
            ->discoverWidgets(in: app_path('Filament/Tax/Widgets'), for: 'App\\Modules\\Tax\\Widgets');
    }
}
