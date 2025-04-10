<?php

namespace App\Modules\Admin\Shield\Role\RoleResource\Pages;

use App\Actions\FilamentActions\FavoriteResourceAction;
use App\Modules\Admin\Shield\Role\RoleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRoles extends ListRecords
{
    protected static string $resource = RoleResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
            FavoriteResourceAction::make()->className(static::$resource),
        ];
    }
}
