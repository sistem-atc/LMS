<?php

namespace App\Providers\Filament;

use Filament\Pages;
use Filament\Panel;
use App\Modules\Admin\Pages\HorizonMonitor;

class AdminPanelProvider extends BasePanelProvider
{

    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('Administracao')
            ->path('admin')
            ->discoverResources(in: app_path('Modules/Admin'), for: 'App\\Modules\\Admin')
            ->pages([
                Pages\Dashboard::class,
                HorizonMonitor::class,
            ])
            ->discoverWidgets(in: app_path('Modules/Admin/Widgets'), for: 'App\\Modules\\Admin\\Widgets');
    }

}
