<?php

namespace App\Filament\Resources\Operational\Cte\CteResource\Pages;

use App\Filament\Resources\Operational\Cte\CteResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCte extends CreateRecord
{
    protected static string $resource = CteResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

}
