<?php

namespace App\Filament\Resources\Register\Bank\BankResource\Pages;

use App\Filament\Resources\Register\Bank\BankResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBanks extends ListRecords
{
    protected static string $resource = BankResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Cadastrar Banco'),
        ];
    }
}
