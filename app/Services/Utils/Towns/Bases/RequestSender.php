<?php

namespace App\Services\Utils\Towns\Bases;

use App\Services\Utils\HttpConnection\Connection;
use App\Enums\HttpMethod;

trait RequestSender
{

    protected static function Conection(string $url, string $Mensage, ?array $headers, ?HttpMethod $verb): string|int|array|null
    {
        $instance = Connection::getInstance();
        return $instance->Conexao($url, $Mensage, $headers, $verb);
    }

}
