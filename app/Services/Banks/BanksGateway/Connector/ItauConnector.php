<?php

declare(strict_types=1);

namespace App\Services\Banks\BanksGateway\Connector;

use Illuminate\Support\Facades\Storage;
use App\Services\Banks\BanksGateway\Contracts\AdapterInterface;
use App\Services\Banks\BanksGateway\Connector\Itau\Concerns\ItauConfig;

class ItauConnector implements AdapterInterface
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

    public function patch(string $url, ?array $params = '')
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

}
