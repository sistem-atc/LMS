<?php

namespace App\Filament\Resources\Register\NatureResource\Pages;

use App\Filament\Resources\Register\NatureResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNatures extends ListRecords
{
    protected static string $resource = NatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Cadastrar Naturezas'),
        ];
    }
}
