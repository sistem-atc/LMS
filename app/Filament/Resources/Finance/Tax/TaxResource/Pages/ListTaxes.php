<?php

namespace App\Filament\Resources\Finance\Tax\TaxResource\Pages;

use App\Filament\Resources\Finance\Tax\TaxResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTaxes extends ListRecords
{
    protected static string $resource = TaxResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
