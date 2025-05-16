<?php

namespace App\Modules\Supply\Register\GroupProductResource\Pages;

use App\Modules\Supply\Register\GroupProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGroupProduct extends EditRecord
{
    protected static string $resource = GroupProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
