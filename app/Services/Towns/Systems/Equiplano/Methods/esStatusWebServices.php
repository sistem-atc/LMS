<?php

namespace App\Services\Towns\Systems\Equiplano\Methods;

trait esStatusWebServices
{

    private static string $operation;

    public static function esStatusWebServices(): string|int|array
    {

        self::$operation = __FUNCTION__;
        self::mountMensage(null, self::$operation);

        return self::connection();
    }

}
