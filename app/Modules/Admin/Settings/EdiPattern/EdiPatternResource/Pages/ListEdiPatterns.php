<?php

namespace App\Modules\Admin\Settings\EdiPattern\EdiPatternResource\Pages;

use App\Actions\FilamentActions\FavoriteResourceAction;
use App\Modules\Admin\Settings\EdiPattern\EdiPatternResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEdiPatterns extends ListRecords
{
    protected static string $resource = EdiPatternResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            FavoriteResourceAction::make()->className(static::$resource),
        ];
    }
}
