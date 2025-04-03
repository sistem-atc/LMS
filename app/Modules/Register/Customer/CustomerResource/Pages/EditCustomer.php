<?php

namespace App\Modules\Register\Customer\CustomerResource\Pages;

use App\Modules\Register\Customer\CustomerResource;
use App\Models\Customer;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class EditCustomer extends EditRecord
{
    protected static string $resource = CustomerResource::class;

    protected $newToken;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {

        if (auth()->user()->can('create_token')) {
            if (Arr::get($data, 'name') || Arr::get($data, 'ability')) {
                $customer = Customer::find($record->id);
                $this->newToken = $customer->createToken($data['name'], $data['ability']);
                $tokenText = $this->newToken->plainTextToken;
                $data['token_api'] = $tokenText;
            }
        }

        Arr::forget($data, 'name');
        Arr::forget($data, 'generateToken');
        Arr::forget($data, 'ability');

        $data['cpf_or_cnpj'] = str_replace('/', '', str_replace('-', '', str_replace('.', '', $data['cpf_or_cnpj'])));

        $record->update($data);

        return $record;
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {

        if ($data['token_api'] !== null) {
            $trimToken = explode('|', $data['token_api']);
            $data['token_api'] = end($trimToken);
        }

        return $data;
    }
}
