<?php

use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $loginUrl = Filament::getPanel('login')->getUrl();
    dd($loginUrl);
    return redirect($loginUrl);
});
