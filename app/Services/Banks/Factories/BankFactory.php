<?php

namespace App\Services\Banks\Factories;

use InvalidArgumentException;
use App\Interfaces\BankInterface;
use App\Helpers\EnvironmentHelper;
use App\Services\Banks\DTO\BankConfig;
use Illuminate\Contracts\Container\BindingResolutionException;

class BankFactory
{
    public static function make(BankConfig $config): BankInterface
    {

        $class = config(key: "bank.{$config->bankCode}");

        if (!$class || !class_exists(class: $class)) {
            throw new InvalidArgumentException(message: "Conector não encontrado para o banco {$config->bankCode}");
        }

        if (!is_subclass_of(object_or_class: $class, class: BankInterface::class)) {
            throw new InvalidArgumentException(message: "A classe {$class} não é um conector válido");
        }

        $env = EnvironmentHelper::getAmbient();
        $bankConfig = config(key: "banks.{$config->bankCode}.{$env}-billings");

        if (!$bankConfig || !is_array(value: $bankConfig)) {
            throw new InvalidArgumentException(message: "Configurações não encontradas para o banco {$config->bankCode} no ambiente {$env}");
        }

        $config = array_merge($bankConfig, [
            'path_crt' => $config->path_crt,
            'path_key' => $config->path_key,
            'agencia' => $config->agencia,
            'conta' => $config->conta,
            'conta_dv' => $config->conta_dv,
            'wallet' => $config->wallet,
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

