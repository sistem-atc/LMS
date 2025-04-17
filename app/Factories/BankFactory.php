<?php

namespace App\Factories;

use ReflectionClass;
use InvalidArgumentException;
use App\Interfaces\BankInterface;
use App\Helpers\EnvironmentHelper;

class BankFactory
{

    public static $config = [];

    public static function make(array $constructorArgs = []): BankInterface
    {

        $class = config('bank.' . $constructorArgs['bankCode']) ?? null;

        if (!$class || !class_exists($class)) {
            throw new InvalidArgumentException("Conector não encontrado para o banco {$constructorArgs['bankCode']}");
        }

        $reflection = new ReflectionClass($class);

        if (!$reflection->isSubclassOf(BankInterface::class)) {
            throw new InvalidArgumentException("A classe {$class} não é um conector válido");
        }

        self::$config = [
            'urlToken' => config('itau-billings.' . EnvironmentHelper::getAmbient() . '.urlToken'),
            'url' => config('itau-billings.' . EnvironmentHelper::getAmbient() . '.url'),
            'client_id' => config('itau-billings.' . EnvironmentHelper::getAmbient() . '.client_id'),
            'client_secret' => config('itau-billings.' . EnvironmentHelper::getAmbient() . '.clientSecret'),
            'path_crt' => $constructorArgs['path_crt'] ?? null,
            'path_key' => $constructorArgs['path_key'] ?? null,
        ];

        return $reflection->newInstanceArgs($constructorArgs);

    }

}
