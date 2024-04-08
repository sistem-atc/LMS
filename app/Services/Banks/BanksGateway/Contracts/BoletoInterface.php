<?php

declare(strict_types=1);

namespace App\Services\Banks\BanksGateway\Contracts;

interface BoletoInterface
{

    public function postBoletos(array $data): array;

    public function getBoletos(): array;

    public function abatimento(int|string $id, array $data): array;

    public function baixa(int|string $id): array;

    public function data_vencimento(int|string $id, array $data): array;

    public function juros(int|string $id): array;

    public function multa(int|string $id): array;

    public function valor_nominal(int|string $id, array $data): array;

    public function data_limite_pagamento(int|string $id, array $data): array;

    public function seu_numero(int|string $id, array $data): array;

    public function protesto(int|string $id): array;

    public function negativacao(int|string $id): array;

    public function desconto(int|string $id): array;

    public function pagador(int|string $id): array;

    public function sacador_avalista(int|string $id): array;

    public function recebimento_divergente(int|string $id): array;
}
