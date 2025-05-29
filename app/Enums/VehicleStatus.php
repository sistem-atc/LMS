<?php

namespace App\Enums;

enum VehicleStatus: string
{
    case ACTIVE = 'ativo';
    case INACTIVE = 'inativo';
    case SOLD = 'vendido';
    case MAINTENANCE = 'manutenção';
    case DISMISSED = 'dispensado';

    public function label(): string
    {
        return match ($this) {
            self::ACTIVE => 'Ativo',
            self::INACTIVE => 'Inativo',
            self::SOLD => 'Vendido',
            self::MAINTENANCE => 'Em Manutenção',
            self::DISMISSED => 'Dispensado',
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
