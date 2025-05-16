<?php

namespace App\Modules\Supply\Register\GroupProductResource\Pages;

use App\Modules\Supply\Register\GroupProductResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGroupProduct extends CreateRecord
{
    protected static string $resource = GroupProductResource::class;
}
