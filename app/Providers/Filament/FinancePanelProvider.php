<?php

namespace App\Providers\Filament;

use Filament\Panel;
use Filament\PanelProvider;

class FinancePanelProvider extends PanelProvider
{

    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('Financeiro')
            ->path('finance')
            ->discoverResources(in: app_path('Modules/Finance'), for: 'App\\Modules\\Finance')
            ->discoverWidgets(in: app_path('Modules/Finance/Widgets'), for: 'App\\Modules\\Finance\\Widgets');
    }
}
