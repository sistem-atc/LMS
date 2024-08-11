<?php

namespace App\Filament\Resources\Settings\EdiPattern\EdiPatternResource\Pages;

use App\Filament\Resources\Settings\EdiPattern\EdiPatternResource;
use Filament\Resources\Pages\CreateRecord;

class CreateEdiPattern extends CreateRecord
{
    protected static string $resource = EdiPatternResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

}
