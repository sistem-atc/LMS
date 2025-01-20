<?php

namespace App\Services\Utils\HttpConnection;

use Exception;
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

    public static function Conexao(string $url, ?string $xmlMesage, ?array $headers, HttpMethod $typeSend = HttpMethod::POST): string | bool | Exception
    {

        if (!HttpMethod::isValid($typeSend->value)) {
            throw new \InvalidArgumentException("Método HTTP inválido: {$typeSend->value}");
        }

        $ch = curl_init();
        $headers = $headers ?? [];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlMesage);

        switch ($typeSend) {
            case HttpMethod::POST:
                curl_setopt($ch, CURLOPT_POST, true);
                break;
            case HttpMethod::PUT:
                curl_setopt($ch, CURLOPT_PUT, true);
                break;
            case HttpMethod::DELETE:
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
                break;
            case HttpMethod::PATCH:
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
                break;
        }

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}

