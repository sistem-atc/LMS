<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\Permission;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\DB;
use BezhanSalleh\FilamentShield\Commands\GenerateCommand;

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

        $this->call('db:seed', ['--class' => 'UserSeeder']);
        $this->call('shield:super-admin', ['--user' => 1]);

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
                    $permission = Permission::createorFirst([
                        'name' => $panel,
                        'guard_name' => 'web',
                    ]);

                    $exists = DB::table('role_has_permissions')
                        ->where('permission_id', $permission->id)
                        ->exists();

                    if (!$exists) {
                        DB::table('role_has_permissions')->insert([
                            'permission_id' => $permission->id,
                            'role_id' => Role::where('name', '=', 'super_admin')->first()->id,
                        ]);
                    };
                }
            );




    }
}
