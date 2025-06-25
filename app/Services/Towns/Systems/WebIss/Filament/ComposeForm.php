<?php

namespace App\Services\Towns\Systems\WebIss\Filament;

use Filament\Forms\Form;
use App\Interfaces\ExcludeSelectInterface;

class ComposeForm implements ExcludeSelectInterface
{
    public static function form(Form $form): Form
    {
        return $form
            ->schema([]);
    }
}
