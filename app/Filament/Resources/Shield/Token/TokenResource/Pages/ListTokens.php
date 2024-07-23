<?php

namespace App\Filament\Resources\Shield\Token\TokenResource\Pages;

use App\Filament\Resources\Shield\Token\TokenResource;
use Rupadana\ApiService\Resources\TokenResource\Pages\ListTokens as PagesListTokens;

class ListTokens extends PagesListTokens
{
    protected static string $resource = TokenResource::class;

}
