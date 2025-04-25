<?php

namespace App\Enums;

enum LicenseCategory: string
{
    case A = 'A';
    case B = 'B';
    case C = 'C';
    case D = 'D';
    case E = 'E';

    public function label(): string
    {
        return match ($this) {
            self::A => 'Categoria A - Motocicletas',
            self::B => 'Categoria B - Automóveis',
            self::C => 'Categoria C - Caminhões',
            self::D => 'Categoria D - Ônibus',
            self::E => 'Categoria E - Carreta / Reboque',
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
