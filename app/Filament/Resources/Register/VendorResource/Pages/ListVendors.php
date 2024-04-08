<?php

namespace App\Filament\Resources\Register\VendorResource\Pages;

use App\Filament\Resources\Register\VendorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVendors extends ListRecords
{
    protected static string $resource = VendorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Cadastrar Vendedores'),
        ];
    }
}
