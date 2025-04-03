<?php

namespace App\Modules\Finance\Accounting\AccountingResource\Pages;

use App\Modules\Finance\Accounting\AccountingResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAccounting extends CreateRecord
{
    protected static string $resource = AccountingResource::class;
}
