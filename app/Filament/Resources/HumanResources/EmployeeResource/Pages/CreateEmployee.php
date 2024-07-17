<?php

namespace App\Filament\Resources\HumanResources\EmployeeResource\Pages;

use App\Filament\Resources\HumanResources\EmployeeResource\EmployeeResource;
use App\Models\User;
use Filament\Resources\Pages\CreateRecord;

class CreateEmployee extends CreateRecord
{
    protected static string $resource = EmployeeResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $contructmail = strtolower(
                    collect(explode(' ', $data['name']))->slice(0, count(explode(' ', $data['name'])))->implode('.')
                ) . config('domain.domain');

        $newUser = User::create([
                    'email' => $contructmail,
                    'branch_logged_id' => $data['branch_id'],
                    'password' => config('domain.defaultPass'),
                ]);

        $data['user_id'] = $newUser->id;

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

}
