<?php

namespace App\Modules\Tms\Vehicle\VehicleResource\Pages;

use App\Modules\Tms\Vehicle\VehicleResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateVehicle extends CreateRecord
{
    protected static string $resource = VehicleResource::class;
}
