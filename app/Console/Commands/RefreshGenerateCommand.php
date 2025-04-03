<?php

namespace App\Console\Commands;

use App\Models\Permission;
use BezhanSalleh\FilamentShield\Commands\GenerateCommand;
use Filament\Facades\Filament;

class RefreshGenerateCommand extends GenerateCommand
{

    /**
     * The panels to generate permissions or policies for, or should be exclude.
     */
    protected array $panels = [];

    protected bool $excludePanels = false;

    public function handle(): int
    {

        $this->generatablePanels();

        return parent::handle();
    }

    protected function generatablePanels(): void
    {

        collect(Filament::getPanels())
            ->mapWithKeys(
                function ($panel) {
                    if ($panel->getId() <> 'login') {
                        return [$panel->getId() => $panel->getId()];
                    }
                    return [];
                }
            )->each(
                function ($panel) {
                    Permission::createorFirst([
                        'name' => $panel,
                        'guard_name' => 'web',
                    ]);
                }
            );
    }
}
