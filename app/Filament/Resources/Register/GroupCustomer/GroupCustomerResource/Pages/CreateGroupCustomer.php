<?php

namespace App\Filament\Resources\Register\GroupCustomer\GroupCustomerResource\Pages;

use App\Filament\Resources\Register\GroupCustomer\GroupCustomerResource;
use Filament\Resources\Pages\CreateRecord;

class CreateGroupCustomer extends CreateRecord
{
    protected static string $resource = GroupCustomerResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

}
