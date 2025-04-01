<?php

namespace App\Filament\Hooks;

use Filament\Facades\Filament;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Filament\View\PanelsRenderHook;

class ConfigRenderHook
{

    public static function getPosition(): string
    {
        return PanelsRenderHook::GLOBAL_SEARCH_BEFORE;
    }

    public static function getView(): View
    {

        Session()->has('dateBase') ?
            $datebase = session()->get('dateBase') :
            $datebase = today()->format('d/m/Y');

        if (is_null(Auth::user()->employee->branch)) {
            $branchelooged = 'NULL';
        } else {
            !is_null(Auth::user()->branch_logged) ?
                $branchelooged = Auth::user()->branch_logged['abbreviation'] :
                $branchelooged = Auth::user()->employee->branch['abbreviation'];
        }

        $module = Filament::getCurrentPanel()->getId();

        return view(
            'filament.pages.branchelogged',
            [
                'branchelooged' => $branchelooged,
                'dateBase' => $datebase,
                'module' => ucfirst($module),
            ]
        );
    }
}
