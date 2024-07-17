<?php

namespace App\Filament\Resources\Register\CustomerResource\Pages;

use App\Filament\Resources\Register\CustomerResource\CustomerResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCustomer extends CreateRecord
{
    protected static string $resource = CustomerResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $data['cpf_or_cnpj'] = str_replace('.','', str_replace('-','', str_replace('/','', $data['cpf_or_cnpj'])));
        return $data;

    }

}
