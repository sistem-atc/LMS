<?php

namespace App\Modules\Tms\TransportDocument\TransportDocumentResource\Pages;

use App\Modules\Tms\TransportDocument\TransportDocumentResource;
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
