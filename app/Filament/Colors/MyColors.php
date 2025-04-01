<?php

namespace App\Filament\Colors;

use Filament\Support\Colors\Color;

class MyColors
{
    public static function getColors(): array
    {
        return [
            'primary' => Color::hex('#117865'),
            'secondary' => '#9CA3AF',
            'success' => '#10B981',
            'danger' => '#EF4444',
            'warning' => '#FBBF24',
            'info' => Color::Amber,
            'light' => '#F3F4F6',
            'dark' => '#111827',
        ];
    }
}
