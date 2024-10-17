<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum LotEnum: string implements HasLabel
{

    case DIGITAÇÃO = 'Em Digitação';
    case CALCULADO = 'Calculado';
    case ESTORNADO = 'Estornado';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::DIGITAÇÃO => 'Em Digitação',
            self::CALCULADO => 'Calculado',
            self::ESTORNADO => 'Estornado',
        };
    }
}
