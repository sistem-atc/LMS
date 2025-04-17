<?php

namespace App\Providers\Filament;

use Filament\Panel;

class AccountingPanelProvider extends BasePanelProvider
{
    public function panel(Panel $panel): Panel
    {

        $panel = $panel
            ->id('Contabilidade')
            ->path('accounting')
            ->discoverResources(in: app_path('Modules/Accounting'), for: 'App\\Modules\\Accounting')
            ->discoverWidgets(in: app_path('Modules/Accounting/Widgets'), for: 'App\\Modules\\Accounting\\Widgets')
            ->discoverPages(in: app_path('Modules/Accounting/Pages'), for: 'App\\Modules\\Accounting\\Pages');

        return $this->baseConfig($panel);

    }
}
