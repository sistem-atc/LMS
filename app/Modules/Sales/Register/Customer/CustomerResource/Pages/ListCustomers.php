<?php

namespace App\Modules\Sales\Register\Customer\CustomerResource\Pages;

use App\Actions\FilamentActions\FavoriteResourceAction;
use App\Modules\Sales\Register\Customer\CustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCustomers extends ListRecords
{
    protected static string $resource = CustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Cadastrar Cliente'),
            FavoriteResourceAction::make()->className(static::$resource),
        ];
    }
}
