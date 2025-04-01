<?php

namespace App\Http;

use Filament\Http\Responses\Auth\Contracts\LoginResponse as Responsable;
use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;


class ControlLoginResponse implements Responsable
{
    public function toResponse($request): RedirectResponse | Redirector
    {

        $module = $request->user()->remember_last_module;

        return redirect()->intended($module);
    }
}
