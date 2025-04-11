<?php

namespace App\Traits;

use App\Enums\HttpMethod;
use App\Utils\Connection;

trait RequestSender
{

    protected static function Conection(string $url, string $Mensage, ?array $headers, ?HttpMethod $verb): string|int|array|null
    {
        $instance = Connection::getInstance();
        return $instance->Conexao($url, $Mensage, $headers, $verb);
    }

}
