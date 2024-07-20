<?php

namespace App\Filament\Resources\HumanResources\Employee\EmployeeResource\Pages;

use App\Filament\Resources\HumanResources\Employee\EmployeeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEmployees extends ListRecords
{
    protected static string $resource = EmployeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Cadastrar Funcionarios'),
        ];
    }
}
