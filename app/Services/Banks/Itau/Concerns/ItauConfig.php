<?php

namespace App\Services\Banks\Itau\Concerns;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Client\PendingRequest;
use App\Services\Banks\Itau\Concerns\GetTokenItau;

trait ItauConfig
{

    private static array $data = [];

    public function __construct(protected ?PendingRequest $http = null, $modelBank = null)
    {

        $this->data = [
            'urlToken' => config('itau-billings.' . static::getAmbient() . '.urlToken'),
            'url' => config('itau-billings.' . static::getAmbient() . '.url'),
            'client_id' => config('itau-billings.' . static::getAmbient() . '.client_id'),
            'client_secret' => config('itau-billings.' . static::getAmbient() . '.clientSecret'),
            'path_crt' => $modelBank->path_crt,
            'path_key' => $modelBank->path_key,
        ];

        GetTokenItau::refreshToken(static::$data);

        $this->http = Http::withHeaders(static::headers())->baseUrl(static::$data['url']);

    }

    private static function getAmbient(): string
    {
        return app()->isLocal() ? 'sandbox' : 'production';
    }

    private static function headers(): array
    {
        return [
            'Authorization' => 'Bearer ' . cache('token'),
            'x-itau-apikey' => static::$data['client_secret'],
            'x-itau-correlationID' => static::$data['client_id'],
            'x-itau-flowID' => Str::uuid(),
            'Accept' => 'application/json',
            'x-itau-client-cert' => Storage::path(path: static::$data['path_crt']),
            'Host' => 'secure.api.cloud.itau.com.br'
        ];
    }

}
