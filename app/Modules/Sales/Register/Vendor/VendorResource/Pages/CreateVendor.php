<?php

namespace App\Modules\Sales\Register\Vendor\VendorResource\Pages;

use App\Modules\Sales\Register\Vendor\VendorResource;
use Filament\Resources\Pages\CreateRecord;

class CreateVendor extends CreateRecord
{
    protected static string $resource = VendorResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
