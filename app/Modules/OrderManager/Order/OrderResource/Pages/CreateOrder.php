<?php

namespace App\Modules\OrderManager\Order\OrderResource\Pages;

use App\Modules\OrderManager\Order\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;
}
