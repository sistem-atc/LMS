<?php

namespace App\Filament\Resources\Operational\CteResource\Pages;

use App\Filament\Resources\Operational\CteResource\CteResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCte extends CreateRecord
{
    protected static string $resource = CteResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

}
