<?php

namespace App\Filament\Resources\Operational\TransportDocument\TransportDocumentResource\Pages;

use App\Filament\Resources\Operational\TransportDocument\TransportDocumentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTransportDocuments extends ListRecords
{
    protected static string $resource = TransportDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Incluir Documento'),
        ];
    }
}
