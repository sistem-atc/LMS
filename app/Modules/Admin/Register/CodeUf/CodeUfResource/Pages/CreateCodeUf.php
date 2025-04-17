<?php

namespace App\Modules\Admin\Register\CodeUf\CodeUfResource\Pages;

use App\Modules\Admin\Register\CodeUf\CodeUfResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCodeUf extends CreateRecord
{
    protected static string $resource = CodeUfResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
