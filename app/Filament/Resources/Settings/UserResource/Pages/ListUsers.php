<?php

namespace App\Filament\Resources\Settings\UserResource\Pages;

use App\Filament\Resources\Settings\UserResource;
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
