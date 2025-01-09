<?php

namespace App\Filament\Resources\Finance\Accounting\AccountingResource\Pages;

use App\Actions\FilamentActions\FavoriteResourceAction;
use App\Filament\Resources\Finance\Accounting\AccountingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAccountings extends ListRecords
{
    protected static string $resource = AccountingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            FavoriteResourceAction::make()->className(static::$resource),
        ];
    }
}
