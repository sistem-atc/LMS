<?php

namespace App\Modules\Admin\Pages;

use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Support\Enums\MaxWidth;

class HorizonMonitor extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.horizon-monitor';

    protected static ?string $title = 'Monitor de Filas';

    protected static ?string $navigationGroup = 'Sistema';

    protected function getHeaderActions(): array
    {
        return [
            Action::make('return')
                ->label('Voltar')
                ->url(Filament::getCurrentPanel()->getUrl())
                ->icon('heroicon-o-arrow-left')
                ->color('secondary')
                ->iconPosition('before'),
        ];
    }


    public function getMaxContentWidth(): MaxWidth
    {
        return MaxWidth::Full;
    }

}
