<?php

namespace App\Modules\Finance\Register\GroupCustomer\GroupCustomerResource\Pages;

use App\Modules\Finance\Register\GroupCustomer\GroupCustomerResource;
use Filament\Resources\Pages\CreateRecord;

class CreateGroupCustomer extends CreateRecord
{
    protected static string $resource = GroupCustomerResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
