<?php

declare(strict_types=1);

namespace App\Services\Banks\Itau\Boleto;

use App\Services\Banks\BanksGateway\Contracts\AdapterInterface;
use App\Services\Banks\BanksGateway\Contracts\BoletoInterface;

class Boleto implements BoletoInterface
{

    public function __construct(
        public AdapterInterface $http,
    ) {
    }

    public function postBoletos(array $data): array
    {
        return $this->http->post('/boletos', $data);
    }

    public function getBoletos(): array
    {
        return $this->http->get('/boletos');
    }

    public function abatimento(int|string $id, array $data): array
    {
        return $this->http->patch('/boletos/' . $id .'/abatimento', $data);
    }

    public function baixa(int|string $id): array
    {
        return $this->http->patch('/boletos/' . $id .'/baixa');
    }

    public function data_vencimento(int|string $id, array $data): array
    {
        return $this->http->patch('/boletos/' . $id .'/data_vencimento', $data);
    }

    public function juros(int|string $id): array
    {
        return $this->http->patch('/boletos/' . $id .'/juros');
    }

    public function multa(int|string $id): array
    {
        return $this->http->patch('/boletos/' . $id .'/multa');
    }

    public function valor_nominal(int|string $id, array $data): array
    {
        return $this->http->patch('/boletos/' . $id .'/valor_nominal', $data);
    }

    public function data_limite_pagamento(int|string $id, array $data): array
    {
        return $this->http->patch('/boletos/' . $id .'/data_limite_pagamento', $data);
    }

    public function seu_numero(int|string $id, array $data): array
    {
        return $this->http->patch('/boletos/' . $id .'/seu_numero', $data);
    }

    public function protesto(int|string $id): array
    {
        return $this->http->patch('/boletos/' . $id .'/protesto');
    }

    public function negativacao(int|string $id): array
    {
        return $this->http->patch('/boletos/' . $id .'/negativacao');
    }


    public function desconto(int|string $id): array
    {
        return $this->http->patch('/boletos/' . $id .'/desconto');
    }

    public function pagador(int|string $id): array
    {
        return $this->http->patch('/boletos/' . $id .'/pagador');
    }

    public function sacador_avalista(int|string $id): array
    {
        return $this->http->patch('/boletos/' . $id .'/sacador_avalista');
    }

    public function recebimento_divergente(int|string $id): array
    {
        return $this->http->patch('/boletos/' . $id .'/recebimento_divergente');
    }

}
