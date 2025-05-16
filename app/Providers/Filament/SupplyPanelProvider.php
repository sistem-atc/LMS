<?php

namespace App\Providers\Filament;

use Filament\Panel;

class SupplyPanelProvider extends BasePanelProvider
{
    public function panel(Panel $panel): Panel
    {

        $panel = $panel
            ->id('Suprimentos')
            ->path('supply')
            ->discoverResources(in: app_path('Modules/Supply'), for: 'App\\Modules\\Supply')
            ->discoverWidgets(in: app_path('Modules/Supply/Widgets'), for: 'App\\Modules\\Supply\\Widgets')
            ->discoverPages(in: app_path('Modules/Supply/Pages'), for: 'App\\Modules\\Supply\\Pages');

        return $this->baseConfig($panel);

    }
}
