<?php

namespace App\Modules\Tms\TravelResource\Pages;

use App\Modules\Tms\TravelResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTravel extends CreateRecord
{
    protected static string $resource = TravelResource::class;
}
