<?php

namespace App\Filament\Resources\Shield\Token\TokenResource\Pages;

use App\Filament\Resources\Shield\Token\TokenResource;
use Rupadana\ApiService\Resources\TokenResource\Pages\CreateToken as PagesCreateToken;

class CreateToken extends PagesCreateToken
{
    protected static string $resource = TokenResource::class;
}
