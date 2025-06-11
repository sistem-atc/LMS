<?php

namespace App\Services\Factories\SpedCte;

use App\Helpers\EnvironmentHelper;
use App\Services\SpedCte\GenerateCTe;
use App\Services\SpedCte\DTO\SpedCteConfig;
use Illuminate\Contracts\Container\BindingResolutionException;

class SpedCTeFactory
{

    public static function make(): GenerateCTe
    {

        $ambient = 'url_' . EnvironmentHelper::getAmbient();
        $branch = session()->get('branch');

        $config = new SpedCteConfig(
            now(),
            $ambient,
            $branch['razao_social'],
            $branch['cnpj'],
            $branch['cpf'],
            $branch['siglaUf'],
            '4.0',
            '4.0'
        );

        try {
            return app()->make(
                abstract: 'App\Services\SpedCte\GenerateCTe',
                parameters: [
                    'config' => $config,
                    'pathPFX' => $branch['pathPFX'],
                ]
            );
        } catch (BindingResolutionException $e) {
            throw new \InvalidArgumentException(
                message: "Erro ao resolver dependências para GenerateCTe: " . $e->getMessage()
            );
        }
    }

}
