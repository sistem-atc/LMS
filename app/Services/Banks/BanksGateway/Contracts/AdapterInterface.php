<?php

declare(strict_types=1);

namespace App\Services\Banks\BanksGateway\Contracts;

interface AdapterInterface
{
    public function get(string $url);

    public function post(string $url, array $params);

    public function patch(string $url, ?array $params = '');

}
