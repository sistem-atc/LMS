<?php

namespace App\Http;

use Aws\Ses\SesClient;
use Filament\Facades\Filament;
use Filament\Http\Responses\Auth\Contracts\LoginResponse as Responsable;
use Filament\Notifications\Notification;
use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;


class ControlLoginResponse implements Responsable
{
    public function toResponse($request): RedirectResponse | Redirector
    {

        if ($request->user()->remember_last_module) {
            $module = $request->user()->remember_last_module;
            $redirect = Filament::getPanel($module)->getUrl();

            return redirect()->intended($redirect);
        };

        foreach (Filament::getPanels() as $panel){
            if ($panel->getId() <> 'login'){
                if(Filament::auth()->user()->hasPermissionTo($panel->getId())){
                    $getPanel = $panel;
                    break;
                }
            }
        }

        if ($getPanel) {
            return redirect()->intended($getPanel->getUrl());
        }

        Filament::auth()->logout();
        session()->invalidate();
        session()->regenerateToken();

        Notification::make()
            ->title('Usuario não parametrizado')
            ->body('Favor acionar o time de TI')
            ->send();

        return redirect()->intended('/login');
    }
}
