<?php

namespace App\Services\Utils\Towns\Helpers;

use Illuminate\Support\Facades\App;

final class EnvironmentHelper
{

    public static function getAmbient(): string
    {
        return App::environment('production') == 'production' ? 'prod' : 'homolog';
    }

}
