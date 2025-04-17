<?php

namespace App\Providers\Filament;

use Filament\Panel;

class FinancePanelProvider extends BasePanelProvider
{

    public function panel(Panel $panel): Panel
    {
        $panel = $panel
            ->id('Financeiro')
            ->path('finance')
            ->discoverResources(in: app_path('Modules/Finance'), for: 'App\\Modules\\Finance')
            ->discoverWidgets(in: app_path('Modules/Finance/Widgets'), for: 'App\\Modules\\Finance\\Widgets')
            ->discoverPages(in: app_path('Modules/Finance/Pages'), for: 'App\\Modules\\Finance\\Pages');

        return $this->baseConfig($panel);

    }
}
