<?php

namespace App\Providers\Filament;

use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Navigation\MenuItem;
use Filament\Support\Colors\Color;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Rupadana\ApiService\ApiServicePlugin;
use Filament\Http\Middleware\Authenticate;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use App\Filament\Resources\Settings\User\UserResource\Pages\EditProfile;

class AdminPanelProvider extends PanelProvider
{

    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->brandName('LMS')
            ->brandLogo(asset('images/W-LogoLMS.png'))
            ->darkModeBrandLogo(asset('images/D-LogoLMS.png'))
            ->brandLogoHeight('3.5rem')
            ->favicon(asset('images/favicon.ico'))
            ->sidebarFullyCollapsibleOnDesktop()
            ->databaseNotifications()
            ->id('lms')
            ->path('lms')
            ->login()
            ->profile(EditProfile::class, false)
            ->userMenuItems($this->useMenuItems())
            ->plugins($this->usePlugins())
            ->colors([
                'primary' => Color::hex('#117865'),
                'info' => Color::Amber,
            ])
            ->renderHook(
                'panels::global-search.before',
                function (): View
                {
                    session(null)->has('DateBase')?
                        $DateBase = session(null)->get('DateBase'):
                        $DateBase = today()->format('d/m/Y');

                    if( !is_null(Auth::user()->branch)) {
                        $branchelooged = 'NULL';
                    } else {
                        !is_null(Auth::user()->branch_logged)?
                            $branchelooged = Auth::user()->branch_logged['abbreviation']:
                            $branchelooged = Auth::user()->branch['abbreviation'];
                    }

                    return view('filament.resources.pages.branchelogged',
                        [
                            'branchelooged' => $branchelooged,
                            'datebase' => $DateBase,
                        ]
                    );
                }
            )
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
            ])
            ->viteTheme('resources/css/filament/lms/theme.css')
            ->font('Nunito')
            ->middleware($this->useMiddleware())
            ->authMiddleware([
                    Authenticate::class,
                ]);
    }

    private function useMenuItems(): array
    {
        return [
            MenuItem::make()
                ->label('Alterar Dados de Acesso')
                ->icon('carbon-branch')
                ->url('/lms/alter-branch'),
        ];
    }

    private function usePlugins(): array
    {
        return [
            ApiServicePlugin::make(),
            FilamentShieldPlugin::make()
        ];
    }

    private function useMiddleware(): array
    {
        return [
            EncryptCookies::class,
            AddQueuedCookiesToResponse::class,
            StartSession::class,
            AuthenticateSession::class,
            ShareErrorsFromSession::class,
            VerifyCsrfToken::class,
            SubstituteBindings::class,
            DisableBladeIconComponents::class,
            DispatchServingFilamentEvent::class,
        ];
    }

}
