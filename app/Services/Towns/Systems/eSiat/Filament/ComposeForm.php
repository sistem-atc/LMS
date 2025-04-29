<?php

namespace App\Services\Towns\eSiat\Filament;

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
