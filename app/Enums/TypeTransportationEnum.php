<?php

namespace App\Enums;

enum TypeTransportationEnum: int
{
    case Aereo = 1;
    case Terrestre = 2;
    case Maritimo = 3;
    case Ferroviario = 4;

    public function getLabel(): int
    {
        return match ($this) {
            self::Aereo => 1,
            self::Terrestre => 2,
            self::Maritimo => 3,
            self::Ferroviario => 4,
        };
    }
}
