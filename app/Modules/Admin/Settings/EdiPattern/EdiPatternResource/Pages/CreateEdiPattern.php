<?php

namespace App\Modules\Admin\Settings\EdiPattern\EdiPatternResource\Pages;

use App\Modules\Admin\Settings\EdiPattern\EdiPatternResource;
use Filament\Resources\Pages\CreateRecord;

class CreateEdiPattern extends CreateRecord
{
    protected static string $resource = EdiPatternResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
