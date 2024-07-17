<?php

namespace App\Filament\Resources\Register\CostcenterResource\Pages;

use App\Filament\Resources\Register\CostcenterResource\CostcenterResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCostcenters extends ListRecords
{
    protected static string $resource = CostcenterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Cadastrar Centro de Custo'),
        ];
    }
}
