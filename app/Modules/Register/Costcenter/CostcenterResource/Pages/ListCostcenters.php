<?php

namespace App\Modules\Register\Costcenter\CostcenterResource\Pages;

use App\Actions\FilamentActions\FavoriteResourceAction;
use App\Modules\Register\Costcenter\CostcenterResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCostcenters extends ListRecords
{
    protected static string $resource = CostcenterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Cadastrar Centro de Custo'),
            FavoriteResourceAction::make()->className(static::$resource),
        ];
    }
}
