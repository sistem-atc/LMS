<?php

namespace App\Filament\Resources\Register\ReceivingType\ReceivingTypeResource\Pages;

use App\Filament\Resources\Register\ReceivingType\ReceivingTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateReceivingType extends CreateRecord
{
    protected static string $resource = ReceivingTypeResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
