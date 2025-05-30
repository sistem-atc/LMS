<?php

namespace App\Modules\Admin\Settings\Situation\SituationResource\Pages;

use App\Actions\FilamentActions\FavoriteResourceAction;
use App\Modules\Admin\Settings\Situation\SituationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSituations extends ListRecords
{
    protected static string $resource = SituationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Cadastrar Situação Fatura'),
            FavoriteResourceAction::make()->className(static::$resource),
        ];
    }
}
