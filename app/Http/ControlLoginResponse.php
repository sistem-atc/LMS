<?php

namespace App\Http;

use Filament\Facades\Filament;
use Illuminate\Http\RedirectResponse;
use Filament\Notifications\Notification;
use Livewire\Features\SupportRedirects\Redirector;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;
use Filament\Http\Responses\Auth\Contracts\LoginResponse as Responsable;


class ControlLoginResponse implements Responsable
{
    public function toResponse($request): RedirectResponse|Redirector
    {

        if ($request->user()->remember_last_module) {
            $module = $request->user()->remember_last_module;
            $redirect = Filament::getPanel($module)->getUrl();

            return redirect()->intended($redirect);
        }

        foreach (Filament::getPanels() as $panel) {
            if ($panel->getId() <> 'login') {
                try {
                    if (Filament::auth()->user()->hasPermissionTo($panel->getId())) {
                        $getPanel = $panel;
                        break;
                    }
                } catch (PermissionDoesNotExist $e) {

                    logger()->warning("Permissão '{$panel->getId()}' não existe para o usuário'.");
                    Filament::auth()->logout();
                    session()->invalidate();
                    session()->regenerateToken();

                    return redirect()->to('/login');

                }
            }
        }

        if ($getPanel) {
            return redirect()->intended($getPanel->getUrl());
        }

        Filament::auth()->logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->intended('/login');
    }
}
