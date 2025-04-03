<?php

namespace App\Modules\Admin\Settings\User\UserResource\Pages;

use App\Actions\FilamentActions\FavoriteResourceAction;
use App\Modules\Admin\Settings\User\UserResource;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            FavoriteResourceAction::make()->className(static::$resource),
        ];
    }
}
