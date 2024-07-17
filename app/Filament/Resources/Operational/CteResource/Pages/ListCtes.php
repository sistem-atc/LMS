<?php

namespace App\Filament\Resources\Operational\CteResource\Pages;

use App\Filament\Resources\Operational\CteResource\CteResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ListCtes extends ListRecords
{
    protected static string $resource = CteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Inserir Cte'),
        ];
    }
}
