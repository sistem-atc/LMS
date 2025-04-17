<?php

namespace App\Modules\Sales\Register\Vendor\VendorResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Actions\FilamentActions\FavoriteResourceAction;
use App\Modules\Sales\Register\Vendor\VendorResource;

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
