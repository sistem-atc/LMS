<?php

namespace App\Modules\Supply\Register\GroupServiceResource\Pages;

use App\Modules\Supply\Register\GroupServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGroupService extends EditRecord
{
    protected static string $resource = GroupServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
