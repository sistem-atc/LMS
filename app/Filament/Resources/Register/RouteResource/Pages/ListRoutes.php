<?php

namespace App\Filament\Resources\Register\RouteResource\Pages;

use App\Filament\Resources\Register\RouteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRoutes extends ListRecords
{
    protected static string $resource = RouteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Cadastrar Rotas'),
        ];
    }
}
