<?php

namespace App\Filament\Resources\Settings\UserResource\Pages;

use App\Filament\Resources\Settings\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Cadastrar Usuarios'),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {

        if($data['branche_logged_id']){
            $data['branche_logged_id'] = $data['branche_id'];
        }

        return $data;

    }
}
