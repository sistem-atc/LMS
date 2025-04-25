<?php

namespace App\Modules\Tms\Register\Driver\DriverResource\Pages;

use App\Modules\Tms\Register\Driver\DriverResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDrivers extends ListRecords
{
    protected static string $resource = DriverResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
