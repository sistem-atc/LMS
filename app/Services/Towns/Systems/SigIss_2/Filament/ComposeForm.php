<?php

namespace App\Services\Towns\SigIss_2\Filament;

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
