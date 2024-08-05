<?php

namespace App\Filament\Resources\Settings\Branch\BranchResource\Pages;

use Filament\Actions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\Settings\Branch\BranchResource;

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

        if ($data['certificatePFX'] == null || $data['certificatePFX'] !== $record->getOriginal('certificatePFX')){
            Storage::disk('local')->delete('certificate\\' . $record->getOriginal('certificatePFX'));
        };

        $record->update($data);

        return $record;
    }

}
