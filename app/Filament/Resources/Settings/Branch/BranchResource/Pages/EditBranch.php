<?php

namespace App\Filament\Resources\Settings\Branch\BranchResource\Pages;

use App\Filament\Resources\Settings\Branch\BranchResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditBranch extends EditRecord
{
    protected static string $resource = BranchResource::class;

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
