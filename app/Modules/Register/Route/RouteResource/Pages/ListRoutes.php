<?php

namespace App\Modules\Register\Route\RouteResource\Pages;

use App\Actions\FilamentActions\FavoriteResourceAction;
use App\Modules\Register\Route\RouteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRoutes extends ListRecords
{
    protected static string $resource = RouteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Cadastrar Rotas'),
            FavoriteResourceAction::make()->className(static::$resource),
        ];
    }
}
