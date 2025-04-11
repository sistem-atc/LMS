<?php

namespace App\Loaders;

use App\Logs\Logging;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Services\Banks\Itau\Methods\Token;
use Illuminate\Http\Client\PendingRequest;

trait ItauConfig
{

    private static array $data = [];

    public function bootItauConfig($modelBank = null)
    {

        static::$data = [
            'urlToken' => config('itau-billings.' . static::getAmbient() . '.urlToken'),
            'url' => config('itau-billings.' . static::getAmbient() . '.url'),
            'client_id' => config('itau-billings.' . static::getAmbient() . '.client_id'),
            'client_secret' => config('itau-billings.' . static::getAmbient() . '.clientSecret'),
            'path_crt' => $modelBank->path_crt,
            'path_key' => $modelBank->path_key,
        ];

        Token::refreshToken(static::$data);

        parent::$http =
            Http::withHeaders(static::headers())
                ->withToken(cache('token'))
                ->baseUrl(static::$data['url'])
                ->tap(function (PendingRequest $request) {
                    $request->beforeSending(
                        fn ($request, $options) => Logging::logRequest($request, $options, 'itau')
                    );
                });

    }

    private static function getAmbient(): string
    {
        return app()->isLocal() ? 'sandbox' : 'production';
    }

    private static function headers(): array
    {
        return [
            'x-itau-apikey' => static::$data['client_secret'],
            'x-itau-correlationID' => static::$data['client_id'],
            'x-itau-flowID' => Str::uuid(),
            'Accept' => 'application/json',
            'x-itau-client-cert' => Storage::path(path: static::$data['path_crt']),
            'Host' => 'secure.api.cloud.itau.com.br'
        ];
    }

}
