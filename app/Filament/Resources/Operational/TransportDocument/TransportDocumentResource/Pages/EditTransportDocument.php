<?php

namespace App\Filament\Resources\Operational\TransportDocument\TransportDocumentResource\Pages;

use App\Filament\Resources\Operational\TransportDocument\TransportDocumentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTransportDocument extends EditRecord
{
    protected static string $resource = TransportDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
