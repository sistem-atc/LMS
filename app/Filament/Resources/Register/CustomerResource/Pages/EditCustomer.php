<?php

namespace App\Filament\Resources\Register\CustomerResource\Pages;

use App\Filament\Resources\Register\CustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditCustomer extends EditRecord
{
    protected static string $resource = CustomerResource::class;

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

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $data['cnpj'] = str_replace('/', '', str_replace('-', '', str_replace('.', '', $data['cnpj'])));

        $record->update($data);

        return $record;
    }
}
