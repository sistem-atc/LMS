<?php

namespace App\Filament\Resources\Register\BankResource\Pages;

use App\Filament\Resources\Register\BankResource\BankResource;
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
