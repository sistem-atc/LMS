<?php

namespace App\Services\Utils\Banks\Logs;

use Illuminate\Support\Facades\Log;

class Logging
{

    public static function logRequest($request, array $options, string $bank)
    {

        $headers = self::sanitizeHeaders($request->getHeaders());

        Log::channel('banks')->info(
            '>>Envio de dados para o banco' . $bank,
            [
                'url' => $request->getUri(),
                'method' => $request->getMethod(),
                'headers' => $headers,
                'body' => $request->getBody()?->getContents(),
            ]
        );
    }

    public static function logResponse($response, string $bank)
    {

        $headers = self::sanitizeHeaders($response->getHeaders());

        Log::channel('banks')->info(
            '<<Resposta do banco ' . $bank,
            [
                'status' => $response->status(),
                'headers' => $headers,
                'body' => $response->getBody(),
            ]
        );
    }

    private static function sanitizeHeaders(array $headers): array
    {
        return collect($headers)
            ->maWithKeys(fn ($value, $key) => is_array($value) ? implode(', ', $value) : $value)
            ->except(['Authorization', 'x-itau-apikey'])
            ->toArray();
    }

}
