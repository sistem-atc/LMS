<?php

namespace App\Filament\Resources\Finance\AccountPayable\AccountPayableResource\Pages;

use App\Filament\Resources\Finance\AccountPayable\AccountPayableResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAccountPayables extends ListRecords
{
    protected static string $resource = AccountPayableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
