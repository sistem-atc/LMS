<?php

namespace App\Modules\Admin\Settings\Branch\BranchResource\Pages;

use App\Actions\FilamentActions\FavoriteResourceAction;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Modules\Admin\Settings\Branch\BranchResource;

class ListBranches extends ListRecords
{
    protected static string $resource = BranchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Cadastrar Filiais'),
            FavoriteResourceAction::make()->className(static::$resource),
        ];
    }
}
