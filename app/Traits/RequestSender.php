<?php

namespace App\Traits;

use App\Enums\HttpMethod;
use App\Utils\Services\HttpRequestService;

trait RequestSender
{

    protected static function Conection(
        ?HttpRequestService $http,
        string $url,
        string $Mensage,
        ?array $headers,
        ?HttpMethod $verb
    ): string|int|array|null {
        $http->make();
        return $http->Conexao($url, $Mensage, $headers, $verb);
    }

}
