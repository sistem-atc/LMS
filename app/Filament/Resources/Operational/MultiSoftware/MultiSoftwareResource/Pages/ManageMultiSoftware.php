<?php

namespace App\Filament\Resources\Operational\MultiSoftware\MultiSoftwareResource\Pages;

use App\Filament\Resources\Operational\MultiSoftware\MultiSoftwareResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageMultiSoftware extends ManageRecords
{
    protected static string $resource = MultiSoftwareResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\CreateAction::make(),
        ];
    }
}
