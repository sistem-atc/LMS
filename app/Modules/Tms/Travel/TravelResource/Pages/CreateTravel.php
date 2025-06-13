<?php

namespace App\Modules\Tms\Travel\TravelResource\Pages;

use App\Modules\Tms\Travel\TravelResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTravel extends CreateRecord
{
    protected static string $resource = TravelResource::class;
}
