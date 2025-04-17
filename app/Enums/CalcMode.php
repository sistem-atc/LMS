<?php

namespace App\Enums;

enum CalcMode: string
{
    case PERCENT = '%';
    case FIXED = 'fixed';

    public function label(): string
    {
        return match ($this) {
            self::PERCENT => 'Percentual sobre a base',
            self::FIXED => 'Valor fixo',
        };
    }

}
