<?php

namespace App\Services\Banks\Template;

use App\Interfaces\BankInterface;
use App\Utils\Services\HttpRequestService;

abstract class BankTemplate implements BankInterface
{

    protected HttpRequestService $http;
    protected array $config;

    public function __construct(
        array $config = []
    ) {
        $this->config = $config;
    }

    public function makeHttpClient(): HttpRequestService
    {
        return new HttpRequestService();
    }

}
