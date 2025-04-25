<?php

namespace App\Modules\Tms\Register\Vehicle\VehicleResource\Pages;

use App\Modules\Tms\Register\Vehicle\VehicleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVehicles extends ListRecords
{
    protected static string $resource = VehicleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
