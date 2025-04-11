<?php

namespace App\Logs;

use Illuminate\Support\Facades\Log;

class Logging
{

    public static function logRequest($request, string $module, string $channel)
    {

        $headers = self::sanitizeHeaders($request->getHeaders());

        Log::channel($channel)->info(
            '>>Envio de dados ' . $module,
            [
                'url' => $request->getUri(),
                'method' => $request->getMethod(),
                'headers' => $headers,
                'body' => $request->getBody()?->getContents(),
            ]
        );
    }

    public static function logResponse($response, string $module, string $channel)
    {

        $headers = self::sanitizeHeaders($response->getHeaders());

        Log::channel($channel)->info(
            '<<Resposta ' . $module,
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
