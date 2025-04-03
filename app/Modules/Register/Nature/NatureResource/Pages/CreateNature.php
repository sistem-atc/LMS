<?php

namespace App\Modules\Register\Nature\NatureResource\Pages;

use App\Modules\Register\Nature\NatureResource;
use Filament\Resources\Pages\CreateRecord;

class CreateNature extends CreateRecord
{
    protected static string $resource = NatureResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
