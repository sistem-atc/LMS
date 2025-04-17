<?php

namespace App\Modules\Accounting\Register\Nature\NatureResource\Pages;

use App\Modules\Accounting\Register\Nature\NatureResource;
use Filament\Resources\Pages\CreateRecord;

class CreateNature extends CreateRecord
{
    protected static string $resource = NatureResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
