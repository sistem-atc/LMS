<?php

namespace App\Providers;

use Laravel\Horizon\Horizon;
use Filament\Facades\Filament;
use App\Http\ControlLogoutResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Hooks\ConfigRenderHook;
use App\Filament\Hooks\FavoriteRenderHook;
use BezhanSalleh\FilamentShield\FilamentShield;
use Filament\Http\Responses\Auth\LogoutResponse;

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

        FilamentShield::prohibitDestructiveCommands(App::environment('production'));

        Config::set('speed-cte.tpAmb', App::environment('production') ? (int) 1 : (int) 2);

        Model::unguard();

        Filament::registerRenderHook(ConfigRenderHook::getPosition(), fn() => ConfigRenderHook::getView());
        Filament::registerRenderHook(FavoriteRenderHook::getPosition(), fn() => FavoriteRenderHook::getView());

        Filament::serving(
            fn() => app()->bind(LogoutResponse::class, ControlLogoutResponse::class)
        );

    }
}
