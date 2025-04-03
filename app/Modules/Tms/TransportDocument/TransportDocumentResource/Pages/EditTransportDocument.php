<?php

namespace App\Modules\Tms\TransportDocument\TransportDocumentResource\Pages;

use App\Modules\Tms\TransportDocument\TransportDocumentResource;
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
