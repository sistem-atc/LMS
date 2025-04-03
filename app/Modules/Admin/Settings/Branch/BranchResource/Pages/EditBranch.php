<?php

namespace App\Modules\Admin\Settings\Branch\BranchResource\Pages;

use App\Modules\Admin\Settings\Branch\BranchResource;
use App\Models\Branch;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

        if ($record->getOriginal('certificatePFX') !== null) {
            if ($data['certificatePFX'] === null) {
                Storage::disk('local')->delete($record->getOriginal('certificatePFX'));
                Branch::where('id', '=', $record->id)->update([
                    'password_certificate' => null,
                ]);
            } elseif ($data['certificatePFX'] !== $record->getOriginal('certificatePFX')) {
                Storage::disk('local')->delete($record->getOriginal('certificatePFX'));
            }
        }

        $record->update($data);

        return $record;
    }
}
