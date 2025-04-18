<?php

namespace App\Modules\Finance\Register\GroupCustomer\GroupCustomerResource\Pages;

use App\Actions\FilamentActions\FavoriteResourceAction;
use App\Modules\Finance\Register\GroupCustomer\GroupCustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGroupCustomers extends ListRecords
{
    protected static string $resource = GroupCustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Cadastrar Grupos de Clientes'),
            FavoriteResourceAction::make()->className(static::$resource),
        ];
    }
}
