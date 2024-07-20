<?php

namespace App\Filament\Resources\HumanResources\Employee\EmployeeResource\Pages;

use App\Filament\Resources\HumanResources\Employee\EmployeeResource;
use App\Models\User;
use Filament\Resources\Pages\CreateRecord;

class CreateEmployee extends CreateRecord
{
    protected static string $resource = EmployeeResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $fullname = explode(' ', $data['name']);

        $contructmail = strtolower(implode('.', [reset($fullname), end($fullname)])) . config('domain.domain');

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
