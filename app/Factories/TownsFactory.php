<?php

namespace App\Factories;

class TownsFactory
{

    public static function getInstance($ibge)
    {

        $class = config('Towns-List.' . $ibge);
        $config = config('Towns.' . $class)[$ibge];
        $town = $config['class_path']::getInstance($config);

        return $town;
    }
}
