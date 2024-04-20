<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasColor;

enum TypeFreightEnum: string implements HasLabel, HasColor
{
    case CIF = 'CIF';
    case FOB = 'FOB';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::CIF => 'CIF',
            self::FOB => 'FOB',
        };
    }


    public function getColor(): string | array | null
    {
        return match ($this) {
            self::CIF => 'primary',
            self::FOB => 'primary',
        };
    }

}
