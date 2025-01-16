<?php

namespace App\Enums;

enum DocumentTypeEnum: int
{
    case CTE = 1;
    case RPSt = 2;
    case RPSs = 3;

    public function getLabel(): int
    {
        return match ($this) {
            self::CTE => 1,
            self::RPSs => 2,
            self::RPSt => 3,
        };
    }
}
