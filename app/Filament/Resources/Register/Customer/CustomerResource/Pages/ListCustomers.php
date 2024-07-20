<?php

namespace App\Filament\Resources\Register\Customer\CustomerResource\Pages;

use App\Filament\Resources\Register\Customer\CustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCustomers extends ListRecords
{
    protected static string $resource = CustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Cadastrar Cliente'),
        ];
    }
}
