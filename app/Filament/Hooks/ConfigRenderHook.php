<?php

namespace App\Filament\Hooks;

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

        Session(null)->has('DateBase') ?
            $DateBase = session(null)->get('DateBase') :
            $DateBase = today()->format('d/m/Y');

        if (is_null(Auth::user()->employee->branch)) {
            $branchelooged = 'NULL';
        } else {
            !is_null(Auth::user()->branch_logged) ?
                $branchelooged = Auth::user()->branch_logged['abbreviation'] :
                $branchelooged = Auth::user()->employee->branch['abbreviation'];
        }

        return view(
            'filament.resources.pages.branchelogged',
            [
                'branchelooged' => $branchelooged,
                'datebase' => $DateBase,
            ]
        );
    }
}
