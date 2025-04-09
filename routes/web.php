<?php

use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;
use Laravel\Horizon\Horizon;

Route::get('/', function () {
    $loginUrl = Filament::getPanel('login')->getUrl();
    return redirect($loginUrl);
});

Horizon::auth(fn ($request) => Filament::auth()->user()->hasRole('super_admin'));
