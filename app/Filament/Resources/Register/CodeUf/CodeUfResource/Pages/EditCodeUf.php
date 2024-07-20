<?php

namespace App\Filament\Resources\Register\CodeUf\CodeUfResource\Pages;

use App\Filament\Resources\Register\CodeUf\CodeUfResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCodeUf extends EditRecord
{
    protected static string $resource = CodeUfResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
