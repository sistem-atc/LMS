<?php

namespace App\Modules\Accounting\Register\Costcenter\CostcenterResource\Pages;

use App\Modules\Accounting\Register\Costcenter\CostcenterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCostcenter extends EditRecord
{
    protected static string $resource = CostcenterResource::class;

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
