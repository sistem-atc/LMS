<?php

namespace App\Filament\Resources\Register\NatureResource\Pages;

use App\Filament\Resources\Register\NatureResource\NatureResource;
use Filament\Resources\Pages\CreateRecord;

class CreateNature extends CreateRecord
{
    protected static string $resource = NatureResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

}
