<?php

namespace App\Services\Banks\Factories;

use InvalidArgumentException;
use App\Interfaces\BankInterface;
use App\Helpers\EnvironmentHelper;
use Illuminate\Contracts\Container\BindingResolutionException;

class BankFactory
{
    public static function make(array $args = []): BankInterface
    {
        $bankCode = $args['bankCode'] ?? null;

        $class = config("bank.{$bankCode}");

        if (!$class || !class_exists($class)) {
            throw new InvalidArgumentException("Conector não encontrado para o banco {$bankCode}");
        }

        if (!is_subclass_of($class, BankInterface::class)) {
            throw new InvalidArgumentException("A classe {$class} não é um conector válido");
        }

        $env = EnvironmentHelper::getAmbient();
        $bankConfig = config("banks.{$bankCode}.{$env}");

        if (!$bankConfig || !is_array($bankConfig)) {
            throw new InvalidArgumentException("Configurações não encontradas para o banco {$bankCode} no ambiente {$env}");
        }

        $config = array_merge($bankConfig, [
            'path_crt' => $args['path_crt'] ?? null,
            'path_key' => $args['path_key'] ?? null,
            'agencia' => $args['agencia'] ?? '',
            'conta' => $args['conta'] ?? '',
            'conta_dv' => $args['conta_dv'] ?? '',
            'wallet' => $args['wallet'] ?? '',
        ]);

        try {
            return app()->make($class, [
                'resolver' => null,
                'config' => $config,
            ]);
        } catch (BindingResolutionException $e) {
            throw new InvalidArgumentException("Erro ao resolver dependências para {$class}: " . $e->getMessage());
        }
    }
}

