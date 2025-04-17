<?php

namespace App\Factories;

use ReflectionClass;
use App\Helpers\EnvironmentHelper;
use App\Interfaces\LinkTownsInterface;

class TownsFactory
{

    public static $config = [];

    public static function make($ibge, array $constructorArgs = []): LinkTownsInterface
    {

        if (!array_key_exists($ibge, config('towns-list'))) {
            throw new \InvalidArgumentException("Conector não encontrado para a prefeitura {$ibge}");
        }

        $className = config('towns-list.' . $ibge);

        if (!class_exists($className['class_path'])) {
            throw new \InvalidArgumentException("Classe não encontrada para a prefeitura {$ibge}");
        }

        $reflection = new ReflectionClass($className['class_path']);

        $urlAmbient = 'url_' . EnvironmentHelper::getAmbient();

        self::$config = [
            'cityName' => $className['city_name'],
            'codeIbge' => $className['ibge'],
            'url' => $className[$urlAmbient],
            'headerVersion' => $className['headerversion'] ?? null,
            'namespace' => $className['namespace'] ?? null,
            'version' => $className['version'] ?? null,
        ];



        return $reflection->newInstanceArgs($constructorArgs);

    }
}
