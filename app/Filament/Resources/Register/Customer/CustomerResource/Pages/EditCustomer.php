<?php

namespace App\Filament\Resources\Register\Customer\CustomerResource\Pages;

use Filament\Actions;
use App\Models\Customer;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\Register\Customer\CustomerResource;

use function PHPUnit\Framework\isNull;

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
                $tokenText =  $this->newToken->plainTextToken;
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

        if ($data['token_api'] !== null){
            CustomerResource::getTabTokenApi(true);
        }

        return $data;
    }

}
