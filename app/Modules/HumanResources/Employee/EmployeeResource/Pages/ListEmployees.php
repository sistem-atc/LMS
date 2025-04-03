<?php

namespace App\Modules\HumanResources\Employee\EmployeeResource\Pages;

use App\Actions\FilamentActions\FavoriteResourceAction;
use App\Modules\HumanResources\Employee\EmployeeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEmployees extends ListRecords
{
    protected static string $resource = EmployeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Cadastrar Funcionarios'),
            FavoriteResourceAction::make()->className(static::$resource),
        ];
    }
}
