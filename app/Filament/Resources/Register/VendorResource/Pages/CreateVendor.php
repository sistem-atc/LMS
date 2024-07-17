<?php

namespace App\Filament\Resources\Register\VendorResource\Pages;

use App\Filament\Resources\Register\VendorResource\VendorResource;
use Filament\Resources\Pages\CreateRecord;

class CreateVendor extends CreateRecord
{
    protected static string $resource = VendorResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

}
