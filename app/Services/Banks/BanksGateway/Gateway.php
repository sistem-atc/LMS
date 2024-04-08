<?php

declare(strict_types=1);

namespace App\Services\Banks\BanksGateway;

use App\Services\Banks\BanksGateway\Connector\Itau\Boleto;
use App\Services\Banks\BanksGateway\Contracts\AdapterInterface;

class Gateway
{

    public function __construct(
        public AdapterInterface $adapter
    ) {
    }

    public function boleto(): Boleto
    {
        return new Boleto($this->adapter);
    }

}
