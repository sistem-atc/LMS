<?php

namespace App\Modules\Tms\Travel\TravelResource\Pages;

use App\Modules\Tms\Travel\TravelResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTravel extends ListRecords
{
    protected static string $resource = TravelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
