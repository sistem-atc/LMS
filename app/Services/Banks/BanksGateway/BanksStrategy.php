<?php

namespace App\Services\Banks\BanksGateway;

use App\Services\Banks\BanksGateway\Contracts\BanksInterface;

class BanksStrategy
{

    private $service;

    public function __construct(BanksInterface $service)
    {
        $this->service = $service;
    }


}
