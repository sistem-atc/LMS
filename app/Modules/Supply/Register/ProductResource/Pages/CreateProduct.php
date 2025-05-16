<?php

namespace App\Modules\Supply\Register\ProductResource\Pages;

use App\Modules\Supply\Register\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;
}
