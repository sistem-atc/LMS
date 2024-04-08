<?php

namespace App\Filament\Resources\Finance\Accounting\AccountingResource\Pages;

use App\Filament\Resources\Finance\Accounting\AccountingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAccounting extends EditRecord
{
    protected static string $resource = AccountingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
