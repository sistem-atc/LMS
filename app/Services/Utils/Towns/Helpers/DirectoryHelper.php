<?php

namespace App\Services\Utils\Towns\Helpers;

use ReflectionClass;

final class DirectoryHelper
{

    public static function getDir(): ?string
    {

        $backtrace = debug_backtrace();
        $caller = $backtrace[2];
        $class = $caller['class'];

        $reflection = new ReflectionClass($class);

        return dirname($reflection->getFileName());
    }

}
