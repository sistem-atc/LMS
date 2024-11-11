<?php

namespace App\Services\Utils\Towns\Helpers;

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

    public static function Conexao(string $url, string $xmlMesage, ?array $headers, ?string $typeSend = 'POST'): string|int
    {

        if (!is_null($headers)) {
            $options = $headers;
        }

        if ($typeSend == 'POST') {
            $response = Http::withHeaders([
                $options,
            ])->post($url, $xmlMesage);
        } else {
            $response = Http::withHeaders([
                $options,
            ])->get($url, $xmlMesage);
        }

        return $response;
    }
}
