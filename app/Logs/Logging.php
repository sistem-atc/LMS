<?php

namespace App\Logs;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Log;

class Logging
{

    public static function logRequest(Request $request, string $module, string $channel)
    {

        $headers = self::sanitizeHeaders($request->headers());

        Log::channel($channel)->info(
            '>>Envio de dados ' . $module,
            [
                'url' => $request->url(),
                'method' => $request->method(),
                'headers' => $headers,
                'body' => $request->body(),
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
            ->mapWithKeys(fn($value, $key) => [$key => is_array($value) ? implode(', ', $value) : $value])
            ->except(['Authorization', 'x-itau-apikey'])
            ->toArray();
    }

}
