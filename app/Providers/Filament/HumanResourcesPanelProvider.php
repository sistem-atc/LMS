<?php

namespace App\Providers\Filament;

use Filament\Panel;

class HumanResourcesPanelProvider extends BasePanelProvider
{

    public function panel(Panel $panel): Panel
    {
        $panel = $panel
            ->id('Recursos Humanos')
            ->path('humanResources')
            ->discoverResources(in: app_path('Modules/HumanResources'), for: 'App\\Modules\\HumanResources')
            ->discoverWidgets(in: app_path('Modules/HumanResources/Widgets'), for: 'App\\Modules\\HumanResources\\Widgets')
            ->discoverPages(in: app_path('Modules/HumanResources/Pages'), for: 'App\\Modules\\HumanResources\\Pages');

        return $this->baseConfig($panel);

    }

}
