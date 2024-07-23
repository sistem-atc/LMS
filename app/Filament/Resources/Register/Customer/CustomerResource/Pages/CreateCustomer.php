<?php

namespace App\Filament\Resources\Register\Customer\CustomerResource\Pages;

use App\Models\Customer;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\Register\Customer\CustomerResource;
use App\Models\User;

class CreateCustomer extends CreateRecord
{
    protected static string $resource = CustomerResource::class;
    protected $newToken;
    protected $createToken;
    protected $thisRecord;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $this->createToken = [
            'name' => Arr::get($data, 'name'),
            'ability' => Arr::get($data, 'ability'),
        ];

        Arr::forget($data, 'name');
        Arr::forget($data, 'generateToken');
        Arr::forget($data, 'ability');

        $data['cpf_or_cnpj'] = str_replace('.','', str_replace('-','', str_replace('/','', $data['cpf_or_cnpj'])));
        return $data;

    }

    protected function beforeCreate(): void
    {
        if (auth()->user()->can('create_token')) {
            $customer = Customer::find($this->thisRecord);
            $this->newToken = $customer->createToken($this->createToken['name'], $this->createToken['ability']);
            $tokenText =  $this->newToken->plainTextToken;
        }
    }

    protected function handleRecordCreation(array $data): Model
    {

        $record = static::getModel()::create($data);
        $this->thisRecord = $record->id;

        return $record;

    }



}
