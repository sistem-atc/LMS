<?php

namespace App\Services\Banks\Connectors;

use Illuminate\Support\Facades\Storage;
use App\Services\Banks\BanksGateway\Contracts\BanksInterface;
use App\Services\Banks\Itau\Concerns\ItauConfig;

class ItauConnector implements BanksInterface
{

    use ItauConfig;

    public function get(string $url)
    {
        try {
            return $this->http
                ->get($url)
                ->throw()
                ->json();
        } catch (\Exception $exception) {
            return ['error' => $exception->getMessage()];
        }
    }

    public function post(string $url, array $params)
    {
        try {
            return $this->http
                ->withBody(json_encode($params))
                ->post($url, array(
                    'cert' => Storage::path($this->databank->path_crt),
                    'ssl_key' => Storage::path($this->databank->path_key),
                ))
                ->throw()
                ->json();
        } catch (\Exception $exception) {
            return ['error' => $exception->getMessage()];
        }
    }

    public function patch(string $url, ?array $params)
    {
        try {
            return $this->http
                ->patch($url, $params)
                ->throw()
                ->json();
        } catch (\Exception $exception) {
            return ['error' => $exception->getMessage()];
        }
    }

    public function delete(string $url, ?array $params)
    {
        try {
            return $this->http
                ->delete($url, $params)
                ->throw()
                ->json();
        } catch (\Exception $exception) {
            return ['error' => $exception->getMessage()];
        }
    }

}
