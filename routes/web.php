<?php

use Inertia\Inertia;
use Laravel\Horizon\Horizon;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Horizon::auth(fn($request) => Filament::auth()->user()->hasRole('super_admin'));
