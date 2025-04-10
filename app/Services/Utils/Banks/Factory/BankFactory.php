<?php

namespace App\Services\Utils\Banks\Factory;

use ReflectionClass;
use InvalidArgumentException;
use Illuminate\Database\Eloquent\Model;
use App\Services\Utils\Banks\Interface\BankInterface;

class BankFactory
{

    protected static array $map = [
        341 => \App\Services\Utils\Banks\Connectors\ItauConnector::class,
    ];

    public static function make(int $bankCode, array $constructorArgs = []): BankInterface
    {
        $class = self::$map[$bankCode] ?? null;

        if (!$class || !class_exists($class)) {
            throw new InvalidArgumentException("Conector não encontrado para o banco {$bankCode}");
        }

        $reflection = new ReflectionClass($class);

        if (!$reflection->isSubclassOf(BankInterface::class)) {
            throw new InvalidArgumentException("A classe {$class} não é um conector válido");
        }

        return $reflection->newInstanceArgs($constructorArgs);
    }

}
