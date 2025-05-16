<?php

namespace App\Modules\Supply\Register\ServiceResource\Pages;

use App\Modules\Supply\Register\ServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateService extends CreateRecord
{
    protected static string $resource = ServiceResource::class;
}
