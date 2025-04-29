<?php

namespace App\Services\Banks\Banks\Itau\TokenResolver;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use App\Interfaces\TokenResolverInterface;
use App\Utils\Services\HttpRequestService;

class TokenResolver implements TokenResolverInterface
{
    protected array $config;
    protected HttpRequestService $http;

    public function __construct(array $config, HttpRequestService $http)
    {
        $this->config = $config;
        $this->http = $http;
    }

    public function getToken(): string
    {
        return
            Cache::remember(
                key: 'itau_token',
                ttl: now()->addSeconds(3500),
                callback: function (): mixed {
                    $body = http_build_query([
                        'grant_type' => 'client_credentials',
                        'client_id' => $this->config['client_id'],
                        'client_secret' => $this->config['client_secret'],
                    ]);

                    $headers = [
                        'Content-Type' => 'application/x-www-form-urlencoded',
                        'x-itau-flowID' => (string) Str::uuid(),
                        'x-itau-correlationID' => (string) Str::uuid(),
                    ];

                    $http = $this->http
                        ->setBaseUrl($this->config['urlToken'])
                        ->setHeaders($headers)
                        ->setCerts($this->config['path_crt'], $this->config['path_key'])
                        ->setChannel('itau')
                        ->make()
                        ->withBody($body, 'application/x-www-form-urlencoded');

                    $response = $http->post(url: '');

                    if ($response->failed()) {
                        throw new \RuntimeException("Falha ao obter token do Itaú: " . $response->body());
                    }

                    return $response->json('access_token');
                }
            );
    }
}
