<?php

namespace App\Filament\Resources\Operational\Lot\LotResource\Pages;

use App\Actions\FilamentActions\FavoriteResourceAction;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\Operational\Lot\LotResource;

class ListLots extends ListRecords
{
    protected static string $resource = LotResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Criar Lote'),
            FavoriteResourceAction::make()->className(static::$resource),
        ];
    }
}
