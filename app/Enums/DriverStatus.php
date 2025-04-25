<?php

namespace App\Enums;

enum DriverStatus: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case SUSPENDED = 'suspended';
    case DISMISSED = 'dismissed';

    public function label(): string
    {
        return match ($this) {
            self::ACTIVE => 'Active',
            self::INACTIVE => 'Inactive',
            self::SUSPENDED => 'Suspended',
            self::DISMISSED => 'Dismissed',
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
