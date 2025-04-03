<?php

namespace App\Modules\Register\Nature\NatureResource\Pages;

use App\Modules\Register\Nature\NatureResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNature extends EditRecord
{
    protected static string $resource = NatureResource::class;

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
