<?php

use Filament\Facades\Filament;
use Laravel\Horizon\Horizon;

Horizon::auth(fn($request) => Filament::auth()->user()->hasRole('super_admin'));
