<?php

namespace App\Filament\Colors;

use App\Helpers\EnvironmentHelper;
use Filament\Support\Colors\Color;

class MyColors
{
    public static function getColors(): array
    {

        $ambient = EnvironmentHelper::getAmbient();

        if ($ambient === 'prod') {

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

        } else {

            return [
                'primary' => Color::hex('#FF0000'),
                'secondary' => '#C70039',
                'success' => '#DAF7A6',
                'danger' => '#581845',
                'warning' => '#A52A2A',
                'info' => Color::Emerald,
                'light' => '#F3F4F6',
                'dark' => '#111827',
            ];

        }
    }
}
