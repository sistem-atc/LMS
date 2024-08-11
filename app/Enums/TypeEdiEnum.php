<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum TypeEdiEnum: string implements HasLabel
{

    case Header = 'Header';
    case Body = 'Body';
    case Footer = 'Footer';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Header => 'Header',
            self::Body => 'Body',
            self::Footer => 'Footer',
        };
    }

}
