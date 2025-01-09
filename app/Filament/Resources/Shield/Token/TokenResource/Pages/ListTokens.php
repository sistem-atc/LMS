<?php

namespace App\Filament\Resources\Shield\Token\TokenResource\Pages;

use App\Actions\FilamentActions\FavoriteResourceAction;
use App\Filament\Resources\Shield\Token\TokenResource;
use Rupadana\ApiService\Resources\TokenResource\Pages\ListTokens as PagesListTokens;
use Filament\Actions;

class ListTokens extends PagesListTokens
{
    protected static string $resource = TokenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Criar Token'),
            FavoriteResourceAction::make()->className(static::$resource),
        ];
    }
}
