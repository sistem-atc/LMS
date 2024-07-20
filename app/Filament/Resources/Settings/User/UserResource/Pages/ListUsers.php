<?php

namespace App\Filament\Resources\Settings\User\UserResource\Pages;

use App\Filament\Resources\Settings\User\UserResource;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }

}
