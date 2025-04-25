<?php

namespace App\Enums;

enum VehicleStatus: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case SOLD = 'sold';
    case MAINTENANCE = 'maintenance';
    case DISMISSED = 'dismissed';

    public function label(): string
    {
        return match ($this) {
            self::ACTIVE => 'Active',
            self::INACTIVE => 'Inactive',
            self::SOLD => 'Sold',
            self::MAINTENANCE => 'In Maintenance',
            self::DISMISSED => 'Dismissed',
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
