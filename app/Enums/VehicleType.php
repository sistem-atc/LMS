<?php

namespace App\Enums;

enum VehicleType: string
{

    case TRACTOR = 'tractor';
    case TRAILER = 'trailer';
    case TRUCK_3_4 = 'truck_3_4';
    case LIGHT_TRUCK = 'light_truck';
    case MEDIUM_TRUCK = 'medium_truck';
    case HEAVY_TRUCK = 'heavy_truck';
    case BITRUCK = 'bitruck';
    case VAN = 'van';
    case TOCO = 'toco';
    case TRUCK = 'truck';
    case ROAD_TRAIN = 'road_train';
    case OTHER = 'other';

    public function label(): string
    {
        return match ($this) {
            self::TRACTOR => 'Tractor (Cavalo Mecânico)',
            self::TRAILER => 'Trailer (Carreta)',
            self::TRUCK_3_4 => 'Truck 3/4',
            self::LIGHT_TRUCK => 'Light Truck (Caminhão Leve)',
            self::MEDIUM_TRUCK => 'Medium Truck (Caminhão Médio)',
            self::HEAVY_TRUCK => 'Heavy Truck (Caminhão Pesado)',
            self::BITRUCK => 'Bitruck',
            self::VAN => 'Van',
            self::TOCO => 'Toco (1 Eixo Traseiro)',
            self::TRUCK => 'Truck (2 Eixos Traseiros)',
            self::ROAD_TRAIN => 'Road Train (Rodotrem)',
            self::OTHER => 'Other',
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
