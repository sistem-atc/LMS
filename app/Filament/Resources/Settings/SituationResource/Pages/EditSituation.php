<?php

namespace App\Filament\Resources\Settings\SituationResource\Pages;

use App\Filament\Resources\Settings\SituationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSituation extends EditRecord
{
    protected static string $resource = SituationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
