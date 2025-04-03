<?php

namespace App\Http;

use Filament\Facades\Filament;
use Filament\Http\Responses\Auth\Contracts\LoginResponse as Responsable;
use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;


class ControlLoginResponse implements Responsable
{
    public function toResponse($request): RedirectResponse | Redirector
    {
        if ($request->user()->remember_last_module) {
            $module = $request->user()->remember_last_module;
            return redirect()->intended($module);
        };

        $panel = collect(Filament::getPanels())
            ->first(fn($panel) => Filament::auth()->user()->hasPermissionTo($panel->getId()));

        if ($panel) {
            return redirect()->intended($panel->getUrl());
        }

        return redirect()->intended('/');
    }
}
