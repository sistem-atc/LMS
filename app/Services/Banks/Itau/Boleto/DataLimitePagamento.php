<?php

declare(strict_types=1);

namespace App\Services\Banks\Itau\Boleto;

use Illuminate\Support\Facades\Http;
use App\Services\Banks\Itau\Concerns\ItauClient;
use App\Services\Banks\Itau\Contracts\ItauInterface;

class DataLimitePagamento implements ItauInterface
{

    use ItauClient;

    public function handle(): array
    {
        try {
            return Http::withHeader('access_token', $this->token)
                ->post("{$this->url}/customers", $this->data)
                ->throw()
                ->json();
        } catch (\Exception $exception) {
            return ['error' => $exception->getMessage()];
        }
    }

}
