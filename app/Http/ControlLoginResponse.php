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
            $panel = Filament::getPanel($module);

            if ($panel && !$panel->isDefault()) {

                Filament::setCurrentPanel($panel);
                $redirect = $panel->getUrl();
                return redirect()->intended($redirect);
            }

            $request->user()->update(['remember_last_module' => null]);

        }

        foreach (Filament::getPanels() as $panel) {
            if (!$panel->isDefault()) {
                try {
                    if (Filament::auth()->user()->hasPermissionTo($panel->getId())) {
                        Filament::setCurrentPanel($panel);
                        return redirect()->intended($panel->getUrl());
                    }
                } catch (PermissionDoesNotExist) {

                    Filament::auth()->logout();
                    session()->invalidate();
                    session()->regenerateToken();

                    Notification::make()
                        ->title("Acesso Negado")
                        ->body("Permissão '{$panel->getId()}' não existe para o usuário'.")
                        ->danger()
                        ->persistent()
                        ->send();

                    return redirect()->to('/login');

                }
            }
        }

        Filament::auth()->logout();
        session()->invalidate();
        session()->regenerateToken();

        Notification::make()
            ->title("Usuario não configurado")
            ->body('Seu usuário não foi configurado para acesso ao sistema. Favor entrar em contato com o time de TI.')
            ->danger()
            ->persistent()
            ->send();

        return redirect()->intended('/login');
    }
}
