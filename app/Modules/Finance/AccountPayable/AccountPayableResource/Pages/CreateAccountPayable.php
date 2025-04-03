<?php

namespace App\Modules\Finance\AccountPayable\AccountPayableResource\Pages;

use App\Modules\Finance\AccountPayable\AccountPayableResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAccountPayable extends CreateRecord
{
    protected static string $resource = AccountPayableResource::class;
}
