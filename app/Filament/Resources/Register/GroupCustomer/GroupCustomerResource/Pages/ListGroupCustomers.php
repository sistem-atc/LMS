<?php

namespace App\Filament\Resources\Register\GroupCustomer\GroupCustomerResource\Pages;

use App\Filament\Resources\Register\GroupCustomer\GroupCustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGroupCustomers extends ListRecords
{
    protected static string $resource = GroupCustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Cadastrar Grupos de Clientes'),
        ];
    }
}
