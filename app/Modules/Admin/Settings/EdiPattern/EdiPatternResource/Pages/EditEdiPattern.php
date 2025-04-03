<?php

namespace App\Modules\Admin\Settings\EdiPattern\EdiPatternResource\Pages;

use App\Modules\Admin\Settings\EdiPattern\EdiPatternResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEdiPattern extends EditRecord
{
    protected static string $resource = EdiPatternResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
