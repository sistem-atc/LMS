<?php

namespace App\Filament\Resources\Operational\Cte\CteResource\Pages;

use App\Actions\FilamentActions\FavoriteResourceAction;
use App\Filament\Resources\Operational\Cte\CteResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ListCtes extends ListRecords
{
    protected static string $resource = CteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Inserir Cte'),
            FavoriteResourceAction::make()->className(static::$resource),
        ];
    }
}
