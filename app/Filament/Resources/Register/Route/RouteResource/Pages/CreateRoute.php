<?php

namespace App\Filament\Resources\Register\Route\RouteResource\Pages;

use App\Filament\Resources\Register\Route\RouteResource;
use Filament\Resources\Pages\CreateRecord;

class CreateRoute extends CreateRecord
{
    protected static string $resource = RouteResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

}
