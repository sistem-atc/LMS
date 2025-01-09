<?php

namespace App\Filament\Resources\Register\Vendor\VendorResource\Pages;

use App\Actions\FilamentActions\FavoriteResourceAction;
use App\Filament\Resources\Register\Vendor\VendorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVendors extends ListRecords
{
    protected static string $resource = VendorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Cadastrar Vendedores'),
            FavoriteResourceAction::make()->className(static::$resource),
        ];
    }
}
