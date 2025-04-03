<?php

namespace App\Modules\Admin\Settings\Situation\SituationResource\Pages;

use App\Modules\Admin\Settings\Situation\SituationResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSituation extends CreateRecord
{
    protected static string $resource = SituationResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
