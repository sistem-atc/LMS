<?php

namespace App\Modules\Sales\Register\FreightTable\FreightTableResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use App\Modules\Sales\Register\FreightTable\FreightTableResource;

class CreateFreightTable extends CreateRecord
{
    protected static string $resource = FreightTableResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
