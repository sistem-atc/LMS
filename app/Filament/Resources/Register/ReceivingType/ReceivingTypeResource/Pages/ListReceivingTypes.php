<?php

namespace App\Filament\Resources\Register\ReceivingType\ReceivingTypeResource\Pages;

use App\Filament\Resources\Register\ReceivingType\ReceivingTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReceivingTypes extends ListRecords
{
    protected static string $resource = ReceivingTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Cadastrar Tipo de Recebimento'),
        ];
    }
}
