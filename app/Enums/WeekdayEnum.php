<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasColor;

enum WeekdayEnum: string implements HasLabel, HasColor
{
    case SEGUNDA = 'Segunda-feira';
    case TERCA = 'Terça-feira';
    case QUARTA = 'Quarta-feira';
    case QUINTA = 'Quinta-feira';
    case SEXTA = 'Sexta-feira';
    case SABADO = 'Sabado';
    case DOMINGO = 'Domingo';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::SEGUNDA => 'Segunda-feira',
            self::TERCA => 'Terça-feira',
            self::QUARTA => 'Quarta-feira',
            self::QUINTA => 'Quinta-feira',
            self::SEXTA => 'Sexta-feira',
            self::SABADO => 'Sabado',
            self::DOMINGO => 'Domingo',
        };
    }


    public function getColor(): string | array | null
    {
        return match ($this) {
            self::SEGUNDA => 'primary',
            self::TERCA => 'primary',
            self::QUARTA => 'primary',
            self::QUINTA => 'primary',
            self::SEXTA => 'primary',
            self::SABADO => 'primary',
            self::DOMINGO => 'primary',
        };
    }

}
