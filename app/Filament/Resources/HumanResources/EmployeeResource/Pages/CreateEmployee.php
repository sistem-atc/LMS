<?php

namespace App\Filament\Resources\HumanResources\EmployeeResource\Pages;

use App\Filament\Resources\HumanResources\EmployeeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEmployee extends CreateRecord
{
    protected static string $resource = EmployeeResource::class;
}
