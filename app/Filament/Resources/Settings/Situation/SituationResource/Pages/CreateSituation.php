<?php

namespace App\Filament\Resources\Settings\Situation\SituationResource\Pages;

use App\Filament\Resources\Settings\Situation\SituationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSituation extends CreateRecord
{
    protected static string $resource = SituationResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
