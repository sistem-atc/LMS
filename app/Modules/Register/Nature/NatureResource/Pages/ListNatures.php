<?php

namespace App\Modules\Register\Nature\NatureResource\Pages;

use App\Actions\FilamentActions\FavoriteResourceAction;
use App\Modules\Register\Nature\NatureResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNatures extends ListRecords
{
    protected static string $resource = NatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Cadastrar Naturezas'),
            FavoriteResourceAction::make()->className(static::$resource),
        ];
    }
}
