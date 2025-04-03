<?php

namespace App\Modules\Finance\Tax\TaxResource\Pages;

use App\Modules\Finance\Tax\TaxResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTax extends CreateRecord
{
    protected static string $resource = TaxResource::class;
}
