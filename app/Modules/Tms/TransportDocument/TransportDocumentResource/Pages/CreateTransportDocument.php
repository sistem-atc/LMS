<?php

namespace App\Modules\Tms\TransportDocument\TransportDocumentResource\Pages;

use App\Helpers\EnvironmentHelper;
use Filament\Resources\Pages\CreateRecord;
use App\Modules\Tms\TransportDocument\TransportDocumentResource;

class CreateTransportDocument extends CreateRecord
{
    protected static string $resource = TransportDocumentResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $nextNumber = $this->model::find()->max('number') + 1;
        $data['number'] = $nextNumber;
        $data['ambient_sefaz'] = EnvironmentHelper::getAmbient();

        return $data;
    }
}
