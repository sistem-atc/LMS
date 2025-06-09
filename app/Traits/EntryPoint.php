<?php

namespace App\Traits;

use Illuminate\Support\Arr;

trait EntryPoint
{

    protected static function triggerEntryPoint($model)
    {

        $reflection = new \ReflectionClass(static::class);
        $pathEntryPoint = 'App\EntryPoints\\';

        $className = $pathEntryPoint .
            Arr::last(explode("\\", $reflection->getName())) .
            'EntryPoint';

        if (class_exists($className)) {
            $className = new $className();
            $className->entryPoint($model);
        }
    }

}
