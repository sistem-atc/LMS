<?php

namespace App\Filament\Resources\Register\CodeUfResource\Pages;

use App\Filament\Resources\Register\CodeUfResource\CodeUfResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCodeUfs extends ListRecords
{
    protected static string $resource = CodeUfResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
