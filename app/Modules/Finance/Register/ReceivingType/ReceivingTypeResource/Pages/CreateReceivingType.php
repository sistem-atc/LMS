<?php

namespace App\Modules\Finance\Register\ReceivingType\ReceivingTypeResource\Pages;

use App\Modules\Finance\Register\ReceivingType\ReceivingTypeResource;
use Filament\Resources\Pages\CreateRecord;

class CreateReceivingType extends CreateRecord
{
    protected static string $resource = ReceivingTypeResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
