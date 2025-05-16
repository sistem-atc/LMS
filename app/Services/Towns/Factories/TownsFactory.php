<?php

namespace App\Services\Towns\Factories;

use App\Helpers\EnvironmentHelper;
use App\Interfaces\LinkTownsInterface;
use Illuminate\Contracts\Container\BindingResolutionException;

class TownsFactory
{

    public static $config = [];

    public static function make(array $args = []): LinkTownsInterface
    {

        if (!array_key_exists('ibge', $args['ibge'])) {
            throw new \InvalidArgumentException("Codigo Ibge não informado para definição da prefeitura");
        }

        $ibge = $args['ibge'];

        if (!array_key_exists($ibge, config('towns-list'))) {
            throw new \InvalidArgumentException("Conector não encontrado para a prefeitura {$ibge}");
        }

        $class = config('towns-list.' . $ibge);

        if (!$class || !class_exists($class['class_path'])) {
            throw new \InvalidArgumentException("Classe não encontrada para a prefeitura {$ibge}");
        }

        $urlAmbient = 'url_' . EnvironmentHelper::getAmbient();

        $config = array_merge($args, [
            'cityName' => $class['city_name'],
            'codeIbge' => $class['ibge'],
            'url' => $class[$urlAmbient],
            'headerVersion' => $class['headerversion'] ?? null,
            'namespace' => $class['namespace'] ?? null,
            'version' => $class['version'] ?? null,
        ]);

        try {
            return app()->make($class, [
                'config' => $config,
            ]);
        } catch (BindingResolutionException $e) {
            throw new \InvalidArgumentException("Erro ao resolver dependências para {$class}: " . $e->getMessage());
        }

    }
}
