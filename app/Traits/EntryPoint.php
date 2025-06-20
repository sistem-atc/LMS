<?php

namespace App\Traits;

use Illuminate\Support\Arr;
use App\Interfaces\EntryPointInterface;
use Illuminate\Database\Eloquent\Model;

trait EntryPoint
{

    protected static function triggerEntryPoint(Model $model)
    {

        $reflection = new \ReflectionClass(objectOrClass: static::class);
        $pathEntryPoint = 'App\EntryPoints\\';

        $className = $pathEntryPoint . Arr::last(array: explode(separator: "\\", string: $reflection->getName()));

        if (
            class_exists($className) &&
            is_subclass_of(object_or_class: $className, class: EntryPointInterface::class)
        ) {

            $instance = new $className();

            if (!method_exists(object_or_class: $instance, method: 'entryPoint')) {
                throw new \RuntimeException(
                    message: "A classe {$className} não implementa o método entryPoint."
                );
            }

            $instance->entryPoint($model);

        }
    }

}
