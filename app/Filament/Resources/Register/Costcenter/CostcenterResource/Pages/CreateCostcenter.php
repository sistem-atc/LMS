<?php

namespace App\Filament\Resources\Register\Costcenter\CostcenterResource\Pages;

use App\Filament\Resources\Register\Costcenter\CostcenterResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCostcenter extends CreateRecord
{
    protected static string $resource = CostcenterResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

}
