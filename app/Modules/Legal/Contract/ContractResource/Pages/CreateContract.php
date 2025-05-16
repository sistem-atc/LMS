<?php

namespace App\Modules\Legal\Contract\ContractResource\Pages;

use App\Modules\Legal\Contract\ContractResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateContract extends CreateRecord
{
    protected static string $resource = ContractResource::class;
}
