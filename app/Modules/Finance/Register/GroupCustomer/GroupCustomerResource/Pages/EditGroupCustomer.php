<?php

namespace App\Modules\Finance\Register\GroupCustomer\GroupCustomerResource\Pages;

use App\Modules\Finance\Register\GroupCustomer\GroupCustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGroupCustomer extends EditRecord
{
    protected static string $resource = GroupCustomerResource::class;

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
