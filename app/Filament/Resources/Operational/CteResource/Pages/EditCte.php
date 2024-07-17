<?php

namespace App\Filament\Resources\Operational\CteResource\Pages;

use App\Filament\Resources\Operational\CteResource\CteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCte extends EditRecord
{
    protected static string $resource = CteResource::class;

    protected function getHeaderActions(): array
    {
        return [
           // Actions\DeleteAction::make(),
            //Actions\ForceDeleteAction::make(),
            //Actions\RestoreAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
