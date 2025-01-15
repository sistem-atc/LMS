<?php

namespace App\Services\Towns\Iss_Londrina\Filament;

use Filament\Forms\Form;
use App\Services\Utils\Towns\Interfaces\ExcludeSelectInterface;

class ComposeForm implements ExcludeSelectInterface
{
    public static function form(Form $form): Form
    {
        return $form
            ->schema([]);
    }
}
