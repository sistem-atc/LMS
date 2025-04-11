<?php

namespace App\loaders;

use App\Services\Utils\Towns\Helpers\EnvironmentHelper;

abstract class ConfigLoader
{

    public static function loadConfig(array $config): array
    {

        if (empty($config)) {
            throw new \InvalidArgumentException("Prefeitura Não Configurada.");
        };

        $urlAmbient = 'url_' . EnvironmentHelper::getAmbient();

        if (empty($config[$urlAmbient])) {
            throw new \InvalidArgumentException("Ambiente não configurado.");
        }

        return [
            'cityName' => $config['city_name'],
            'codeIbge' => $config['ibge'],
            'username' => $config['username'] ?? null,
            'password' => $config['password'] ?? null,
            'url' => $config[$urlAmbient],
            'headerVersion' => $config['headerversion'] ?? null,
            'namespace' => $config['namespace'] ?? null,
            'version' => $config['version'] ?? null,
        ];
    }

}
