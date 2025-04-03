<?php

namespace App\Modules\Register\GroupCustomer\GroupCustomerResource\Pages;

use App\Modules\Register\GroupCustomer\GroupCustomerResource;
use Filament\Resources\Pages\CreateRecord;

class CreateGroupCustomer extends CreateRecord
{
    protected static string $resource = GroupCustomerResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
