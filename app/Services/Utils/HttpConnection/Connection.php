<?php

namespace App\Services\Utils\HttpConnection;

use App\Enums\HttpMethod;
use Illuminate\Support\Facades\Http;

class Connection
{
    private static $instance;

    public static function getInstance()
    {

        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public static function Conexao(
        string $url,
        ?string $xmlMesage,
        ?array $headers,
        HttpMethod $typeSend = HttpMethod::POST
    ): string|int {

        if (!HttpMethod::isValid($typeSend->value)) {
            throw new \InvalidArgumentException("Método HTTP inválido: {$typeSend->value}");
        }

        if (!is_null($headers)) {
            $response = Http::withHeaders([$headers]);
        }

        switch ($typeSend) {
            case HttpMethod::POST:
                return $response->post($url, $xmlMesage);

            case HttpMethod::GET:
                return $response->get($url, $xmlMesage);

            case HttpMethod::PUT:
                return $response->put($url, $xmlMesage);

            case HttpMethod::DELETE:
                return $response->delete($url, $xmlMesage);

            case HttpMethod::PATCH:
                return $response->patch($url, $xmlMesage);
        }
    }
}
