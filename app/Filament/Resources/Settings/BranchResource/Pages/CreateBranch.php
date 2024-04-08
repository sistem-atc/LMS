<?php

namespace App\Filament\Resources\Settings\BranchResource\Pages;

use App\Filament\Resources\Settings\BranchResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBranch extends CreateRecord
{
    protected static string $resource = BranchResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['cnpj'] = str_replace('/', '', str_replace('-', '', str_replace('.', '', $data['cnpj'])));
        return $data;
    }

}
