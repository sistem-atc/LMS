<?php

namespace App\Services\Banks\DTO;

use App\Interfaces\TokenResolverInterface;

final readonly class BankConfig
{

    public string $bankCode;
    public string $path_crt;
    public string $path_key;
    public string $agencia;
    public string $conta;
    public string $conta_dv;
    public string $wallet;
    public ?string $tokenResolver;

    public function __construct(array $config)
    {
        $this->bankCode = $config['bankCode'] ?? null;
        $this->path_crt = $config['path_crt'] ?? null;
        $this->path_key = $config['path_key'] ?? null;
        $this->agencia = $config['agencia'] ?? null;
        $this->conta = $config['conta'] ?? null;
        $this->conta_dv = $config['conta_dv'] ?? null;
        $this->wallet = $config['wallet'] ?? null;
        $this->tokenResolver = $config['tokenResolver'] ?? null;
    }
}
