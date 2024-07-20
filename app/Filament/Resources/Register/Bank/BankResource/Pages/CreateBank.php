<?php

namespace App\Filament\Resources\Register\Bank\BankResource\Pages;

use App\Filament\Resources\Register\Bank\BankResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBank extends CreateRecord
{
    protected static string $resource = BankResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

}
