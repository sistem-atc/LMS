<?php

namespace App\Modules\Finance\Register\Bank\BankResource\Pages;

use App\Modules\Finance\Register\Bank\BankResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBank extends EditRecord
{
    protected static string $resource = BankResource::class;

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

    protected function mutateFormDataBeforeSave(array $data): array
    {

        if ($data['blocked']) {
            $data['date_blocked'] = date('d-m-Y H:i:s', strtotime(now()));
        }

        return $data;
    }
}
