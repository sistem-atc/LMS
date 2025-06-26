<?php

namespace App\Modules\Accounting\Register\Account\AccountResource\Pages;

use App\Modules\Accounting\Register\Account\AccountResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAccount extends CreateRecord
{
    protected static string $resource = AccountResource::class;
}
