<?php

namespace App\Modules\Supply\Register\GroupProductResource\Pages;

use App\Modules\Supply\Register\GroupProductResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGroupProducts extends ListRecords
{
    protected static string $resource = GroupProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
