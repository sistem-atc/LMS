<?php

namespace App\Modules\Supply\Register\GroupServiceResource\Pages;

use App\Modules\Supply\Register\GroupServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGroupService extends CreateRecord
{
    protected static string $resource = GroupServiceResource::class;
}
