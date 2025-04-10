<?php

namespace App\Modules\Finance\Supplie\SupplieResource\Pages;

use App\Actions\FilamentActions\FavoriteResourceAction;
use App\Modules\Finance\Supplie\SupplieResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSupplies extends ListRecords
{
    protected static string $resource = SupplieResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            FavoriteResourceAction::make()->className(static::$resource),
        ];
    }
}
