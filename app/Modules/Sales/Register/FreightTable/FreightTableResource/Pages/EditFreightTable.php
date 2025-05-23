<?php

namespace App\Modules\Sales\Register\FreightTable\FreightTableResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Modules\Sales\Register\FreightTable\FreightTableResource;

class EditFreightTable extends EditRecord
{
    protected static string $resource = FreightTableResource::class;

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
