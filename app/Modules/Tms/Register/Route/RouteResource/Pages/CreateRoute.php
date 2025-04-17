<?php

namespace App\Modules\Tms\Register\Route\RouteResource\Pages;

use App\Modules\Tms\Register\Route\RouteResource;
use Filament\Resources\Pages\CreateRecord;

class CreateRoute extends CreateRecord
{
    protected static string $resource = RouteResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
