<?php

namespace App\Filament\Resources\Register\CodeUfResource\Pages;

use App\Filament\Resources\Register\CodeUfResource\CodeUfResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCodeUf extends CreateRecord
{
    protected static string $resource = CodeUfResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
