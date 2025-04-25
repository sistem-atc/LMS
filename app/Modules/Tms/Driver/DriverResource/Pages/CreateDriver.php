<?php

namespace App\Modules\Tms\Driver\DriverResource\Pages;

use App\Modules\Tms\Driver\DriverResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDriver extends CreateRecord
{
    protected static string $resource = DriverResource::class;
}
