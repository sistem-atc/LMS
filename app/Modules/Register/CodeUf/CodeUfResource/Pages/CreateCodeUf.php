<?php

namespace App\Modules\Register\CodeUf\CodeUfResource\Pages;

use App\Modules\Register\CodeUf\CodeUfResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCodeUf extends CreateRecord
{
    protected static string $resource = CodeUfResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
