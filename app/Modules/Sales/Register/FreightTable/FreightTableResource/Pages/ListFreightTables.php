<?php

namespace App\Modules\Sales\Register\FreightTable\FreightTableResource\Pages;

use App\Actions\FilamentActions\FavoriteResourceAction;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Modules\Sales\Register\FreightTable\FreightTableResource;

class ListFreightTables extends ListRecords
{
    protected static string $resource = FreightTableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Cadastrar Nova Tabela de Frete'),
            FavoriteResourceAction::make()->className(static::$resource),
        ];
    }
}
