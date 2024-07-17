<?php

namespace App\Filament\Resources\Register\ReceivingTypeResource\Pages;

use App\Filament\Resources\Register\ReceivingTypeResource\ReceivingTypeResource;
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
