<?php

namespace App\Enums;

enum TypeRPS: int
{
    case RPS = 1;
    case CUPOM = 2;

    public function getLabel(): int
    {
        return match ($this) {
            self::RPS => 1,
            self::CUPOM => 2,
        };
    }
}
