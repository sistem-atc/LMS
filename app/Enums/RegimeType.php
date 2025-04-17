<?php

namespace App\Enums;

enum RegimeType: string
{

    case SIMPLES = 'simples';
    case LUCRO_PRESUMIDO = 'lucro_presumido';
    case LUCRO_REAL = 'lucro_real';

    public function label(): string
    {
        return match ($this) {
            self::SIMPLES => 'Simples Nacional',
            self::LUCRO_PRESUMIDO => 'Lucro Presumido',
            self::LUCRO_REAL => 'Lucro Real',
        };
    }

}
