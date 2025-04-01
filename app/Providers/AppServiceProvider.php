<?php

namespace App\Providers;

use App\Filament\Resources\Shield\Token\TokenResource;
use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Rupadana\ApiService\Resources\TokenResource as ResourcesTokenResource;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Config::set('speed-cte.tpAmb', App::environment('production') ? (int) 1 : (int) 2);
        Model::unguard();
        Filament::registerNavigationGroups([
            'Configurações',
            'Cadastros',
            'Financeiro',
            'Operacional',
        ]);
    }
}
