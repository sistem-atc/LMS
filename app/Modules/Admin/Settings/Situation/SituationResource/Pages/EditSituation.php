<?php

namespace App\Modules\Admin\Settings\Situation\SituationResource\Pages;

use App\Modules\Admin\Settings\Situation\SituationResource;
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
