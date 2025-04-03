<?php

namespace App\Modules\Register\FreightTable\FreightTableResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use App\Modules\Register\FreightTable\FreightTableResource;

class CreateFreightTable extends CreateRecord
{
    protected static string $resource = FreightTableResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
