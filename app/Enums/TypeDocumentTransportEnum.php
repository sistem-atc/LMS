<?php

namespace App\Enums;

enum TypeDocumentTransportEnum: int
{
    case CT_e_Normal = 1;
    case CT_e_OS = 2;
    case RPS_t = 3;
    case RPS_s = 4;
    case CT_e_Devolucao = 5;
    case CT_e_Subtituição = 6;

    public function getLabel(): int
    {
        return match ($this) {
            self::CT_e_Normal => 1,
            self::CT_e_OS => 2,
            self::RPS_t => 3,
            self::RPS_s => 4,
            self::CT_e_Devolucao => 5,
            self::CT_e_Subtituição => 6,
        };
    }
}
