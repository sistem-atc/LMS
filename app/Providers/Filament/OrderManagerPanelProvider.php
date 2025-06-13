<?php

namespace App\Providers\Filament;

use Filament\Panel;

class OrderManagerPanelProvider extends BasePanelProvider
{
    public function panel(Panel $panel): Panel
    {
        $panel = $panel
            ->id('OM')
            ->path('order-manager')
            ->discoverResources(in: app_path('Modules/OrderManager'), for: 'App\\Modules\\OrderManager')
            ->discoverWidgets(in: app_path('Filament/OrderManager/Widgets'), for: 'App\\Modules\\OrderManager\\Widgets')
            ->discoverPages(in: app_path('Modules/OrderManager/Pages'), for: 'App\\Modules\\OrderManager\\Pages');

        return $this->baseConfig($panel);
    }
}
