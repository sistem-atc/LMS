<?php

namespace App\Modules\Finance\Supplie\SupplieResource\Pages;

use App\Modules\Finance\Supplie\SupplieResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSupplie extends EditRecord
{
    protected static string $resource = SupplieResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
