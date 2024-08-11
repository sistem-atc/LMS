<?php

namespace App\Filament\Resources\Settings\EdiPattern\EdiPatternResource\Pages;

use App\Filament\Resources\Settings\EdiPattern\EdiPatternResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEdiPatterns extends ListRecords
{
    protected static string $resource = EdiPatternResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
