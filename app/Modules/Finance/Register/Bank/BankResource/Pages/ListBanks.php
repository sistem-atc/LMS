<?php

namespace App\Modules\Finance\Register\Bank\BankResource\Pages;

use App\Actions\FilamentActions\FavoriteResourceAction;
use App\Modules\Finance\Register\Bank\BankResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBanks extends ListRecords
{
    protected static string $resource = BankResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Cadastrar Banco'),
            FavoriteResourceAction::make()->className(static::$resource),
        ];
    }
}
