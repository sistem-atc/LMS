<?php

namespace App\Filament\Resources\Register\GroupCustomerResource\Pages;

use App\Filament\Resources\Register\GroupCustomerResource\GroupCustomerResource;
use Filament\Resources\Pages\CreateRecord;

class CreateGroupCustomer extends CreateRecord
{
    protected static string $resource = GroupCustomerResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

}
