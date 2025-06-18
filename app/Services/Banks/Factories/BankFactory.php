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

        $class = config(key: "bank.{$bankCode}");

        if (!$class || !class_exists(class: $class)) {
            throw new InvalidArgumentException(message: "Conector não encontrado para o banco {$bankCode}");
        }

        if (!is_subclass_of(object_or_class: $class, class: BankInterface::class)) {
            throw new InvalidArgumentException(message: "A classe {$class} não é um conector válido");
        }

        $env = EnvironmentHelper::getAmbient();
        $bankConfig = config(key: "banks.{$bankCode}.{$env}");

        if (!$bankConfig || !is_array(value: $bankConfig)) {
            throw new InvalidArgumentException(message: "Configurações não encontradas para o banco {$bankCode} no ambiente {$env}");
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

            return app()->make(
                abstract: $class,
                parameters: [
                    'resolver' => null,
                    'config' => $config,
                ]
            );

        } catch (BindingResolutionException $e) {

            throw new InvalidArgumentException(
                message: "Erro ao resolver dependências para {$class}: " . $e->getMessage()
            );

        }
    }
}

