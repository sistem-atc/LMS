<?php

namespace App\Services\Banks\BanksGateway\Contracts;

interface BanksInterface
{
    public function get(string $url);

    public function post(string $url, array $params);

    public function patch(string $url, ?array $params = '');

}
