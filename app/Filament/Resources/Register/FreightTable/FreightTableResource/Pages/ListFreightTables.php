<?php

namespace App\Filament\Resources\Register\FreightTable\FreightTableResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\Register\FreightTable\FreightTableResource;

class ListFreightTables extends ListRecords
{
    protected static string $resource = FreightTableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Cadastrar Nova Tabela de Frete'),
        ];
    }
}
