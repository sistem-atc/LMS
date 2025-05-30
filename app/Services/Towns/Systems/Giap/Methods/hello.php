<?php

namespace App\Services\Towns\Systems\Giap\Methods;

trait hello
{

    private static string $operation;

    public function hello(): string|int|array
    {

        self::$operation = __FUNCTION__;
        $dataMsg = null;
        self::mountMensage($dataMsg);

        return self::connection();

    }

}
