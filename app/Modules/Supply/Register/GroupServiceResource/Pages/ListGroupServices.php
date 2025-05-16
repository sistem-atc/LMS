<?php

namespace App\Modules\Supply\Register\GroupServiceResource\Pages;

use App\Modules\Supply\Register\GroupServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGroupServices extends ListRecords
{
    protected static string $resource = GroupServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
