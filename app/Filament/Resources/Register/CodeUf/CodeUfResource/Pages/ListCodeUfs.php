<?php

namespace App\Filament\Resources\Register\CodeUf\CodeUfResource\Pages;

use App\Actions\FilamentActions\FavoriteResourceAction;
use App\Filament\Resources\Register\CodeUf\CodeUfResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCodeUfs extends ListRecords
{
    protected static string $resource = CodeUfResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            FavoriteResourceAction::make()->className(static::$resource),
        ];
    }
}
