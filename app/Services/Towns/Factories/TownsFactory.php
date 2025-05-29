<?php

namespace App\Services\Towns\Factories;

use App\Helpers\EnvironmentHelper;
use App\Interfaces\LinkTownsInterface;
use App\Services\Towns\DTO\TownConfig;
use Illuminate\Contracts\Container\BindingResolutionException;

class TownsFactory
{
    public static function make(array $args = []): LinkTownsInterface
    {

        if (!isset($args['ibge'])) {
            throw new \InvalidArgumentException(message: "Codigo Ibge não informado para definição da prefeitura");
        }

        $ibge = $args['ibge'];
        $townsList = config(key: 'towns-list');

        if (!isset($townsList[$ibge])) {
            throw new \InvalidArgumentException(message: "Conector não encontrado para a prefeitura {$ibge}");
        }

        $classInfo = $townsList[$ibge];
        $classPath = $classInfo['class_path'] ?? null;

        if (!$classPath || !class_exists(class: $classPath)) {
            throw new \InvalidArgumentException(message: "Classe não encontrada para a prefeitura {$ibge}");
        }

        $urlAmbient = 'url_' . EnvironmentHelper::getAmbient();

        $config = new TownConfig(
            cityName: $classInfo['city_name'],
            url: $classInfo[$urlAmbient] ?? '',
            codeIbge: $classInfo['ibge'],
            namespace: $classInfo['namespace'] ?? null,
            headerVersion: $classInfo['headerversion'] ?? null,
            version: $classInfo['version'] ?? null
        );

        try {
            return app()->make(
                abstract: $classPath,
                parameters: [
                    'config' => $config,
                ]
            );
        } catch (BindingResolutionException $e) {
            throw new \InvalidArgumentException(
                message: "Erro ao resolver dependências para {$classPath}: " . $e->getMessage()
            );
        }

    }
}
