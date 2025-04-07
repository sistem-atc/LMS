<?php

namespace App\Modules\HumanResources\Employee\EmployeeResource\Pages;

use App\Models\User;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Modules\HumanResources\Employee\EmployeeResource;

class CreateEmployee extends CreateRecord
{
    protected static string $resource = EmployeeResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $fullname = explode(' ', $data['name']);

        $contructmail = strtolower(implode('.', [reset($fullname), end($fullname)])) . config('domain.domain');

        $newUser = User::create([
            'name' => $data['name'],
            'email' => $contructmail,
            'branch_logged_id' => $data['branch_id'],
            'password' => config('domain.defaultPass'),
            'is_active' => false,
        ]);

        $data['user_id'] = $newUser->id;

        $admins = User::role('super_admin')->get();

        foreach ($admins as $admin) {
            Notification::make()
                ->title('Novo usuário criado')
                ->body('Um novo usuário foi criado com o e-mail: ' . $contructmail . 'Favor incluir a regra e ativar o usuario!')
                ->sendTo($admin);
        }

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
