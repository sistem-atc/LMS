<?php

namespace App\Filament\Resources\Finance\Supplie\SupplieResource\Pages;

use App\Filament\Resources\Finance\Supplie\SupplieResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSupplies extends ListRecords
{
    protected static string $resource = SupplieResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
