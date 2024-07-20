<?php

namespace App\Filament\Resources\Operational\Lot\LotResource\Pages;

use App\Filament\Resources\Operational\Lot\LotResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLot extends EditRecord
{
    protected static string $resource = LotResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
