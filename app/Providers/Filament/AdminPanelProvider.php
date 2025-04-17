<?php

namespace App\Providers\Filament;

use Filament\Panel;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;

class AdminPanelProvider extends BasePanelProvider
{

    public function panel(Panel $panel): Panel
    {

        $panel = $panel
            ->id('Administracao')
            ->path('admin')
            ->discoverResources(in: app_path('Modules/Admin'), for: 'App\\Modules\\Admin')
            ->discoverWidgets(in: app_path('Modules/Admin/Widgets'), for: 'App\\Modules\\Admin\\Widgets')
            ->discoverPages(in: app_path('Modules/Admin/Pages'), for: 'App\\Modules\\Admin\\Pages')
            ->plugin(FilamentShieldPlugin::make());

        return $this->baseConfig($panel);
    }

}
