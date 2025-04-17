<?php

namespace App\Providers\Filament;

use Filament\Panel;

class TmsPanelProvider extends BasePanelProvider
{

    public function panel(Panel $panel): Panel
    {
        $panel = $panel
            ->id('tms')
            ->path('tms')
            ->discoverResources(in: app_path('Modules/Tms'), for: 'App\\Modules\\Tms')
            ->discoverWidgets(in: app_path('Modules/Tms/Widgets'), for: 'App\\Modules\\Tms\\Widgets')
            ->discoverPages(in: app_path('Modules/Tms/Pages'), for: 'App\\Modules\\Tms\\Pages');

        return $this->baseConfig($panel);

    }
}
