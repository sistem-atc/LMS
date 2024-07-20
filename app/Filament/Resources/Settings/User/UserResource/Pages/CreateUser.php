<?php

namespace App\Filament\Resources\Settings\User\UserResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\Settings\User\UserResource;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['branch_logged_id'] = $data['branch_id'];
        return $data;
    }
}
