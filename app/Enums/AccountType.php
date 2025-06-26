<?php

namespace App\Enums;

enum AccountType: string
{

    case DEBIT = 'Debito';
    case CREDIT = 'Credito';

    public function label(): string
    {
        return match ($this) {
            self::DEBIT => 'Debito',
            self::CREDIT => 'Credito',
        };
    }

}
