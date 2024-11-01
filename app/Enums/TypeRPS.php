<?php

namespace App\Enums;

enum TypeRPS: string
{
    case RPS = 'RPS';
    case CUPOM = 'Cupom';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::RPS => 'RPS',
            self::CUPOM => 'Cupom',
        };
    }
}
