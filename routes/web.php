<?php

use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $loginUrl = Filament::getPanel('login')->getUrl();
    return redirect($loginUrl);
});
