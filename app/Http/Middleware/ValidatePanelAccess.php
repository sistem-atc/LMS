<?php

namespace App\Http\Middleware;

use Closure;
use Filament\Facades\Filament;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidatePanelAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user = Filament::auth()->user();

        if ($user->hasPermissionTo(Filament::getCurrentPanel()->getId())) {
            return $next($request);
        }

        Notification::make()
            ->title('Acesso Negado')
            ->body('Você não tem permissão para acessar este painel.')
            ->danger()
            ->send();

        return redirect()->back();
    }
}
