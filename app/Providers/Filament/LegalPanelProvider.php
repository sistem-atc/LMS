<?php

namespace App\Providers\Filament;

use Filament\Panel;

class LegalPanelProvider extends BasePanelProvider
{
    public function panel(Panel $panel): Panel
    {

        $panel = $panel
            ->id('Juridico')
            ->path('legal')
            ->discoverResources(in: app_path('Modules/Legal'), for: 'App\\Modules\\Legal')
            ->discoverWidgets(in: app_path('Modules/Legal/Widgets'), for: 'App\\Modules\\Legal\\Widgets')
            ->discoverPages(in: app_path('Modules/Legal/Pages'), for: 'App\\Modules\\Legal\\Pages');

        return $this->baseConfig($panel);

    }
}
