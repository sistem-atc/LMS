<?php

namespace App\Filament\Resources\Finance\AccountPayable\AccountPayableResource\Pages;

use App\Actions\FilamentActions\FavoriteResourceAction;
use App\Filament\Resources\Finance\AccountPayable\AccountPayableResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAccountPayables extends ListRecords
{
    protected static string $resource = AccountPayableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            FavoriteResourceAction::make()->className(static::$resource),
        ];
    }
}
