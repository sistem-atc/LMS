<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum CustomerRiscEnum: string implements HasLabel
{

    case A = 'Risco A';
    case B = 'Risco B';
    case C = 'Risco C';
    case D = 'Risco D';
    case E = 'Risco E';
    case F = 'Risco F';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::A => 'Risco A',
            self::B => 'Risco B',
            self::C => 'Risco C',
            self::D => 'Risco D',
            self::E => 'Risco E',
            self::F => 'Risco F',
        };
    }

}
