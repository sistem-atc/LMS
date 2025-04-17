<?php

namespace App\Modules\Finance\Register\ReceivingType\ReceivingTypeResource\Pages;

use App\Modules\Finance\Register\ReceivingType\ReceivingTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReceivingType extends EditRecord
{
    protected static string $resource = ReceivingTypeResource::class;

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
