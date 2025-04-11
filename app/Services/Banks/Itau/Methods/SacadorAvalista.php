<?php

namespace App\Services\Banks\Itau\Methods;

use App\Logs\Logging;

trait SacadorAvalista
{

    private static string $endPoint;

    public static function alterarSacadorAvalista(array $data): array
    {

        self::$endPoint = '/boletos/' . $data['id_boleto'] . '/sacador_avalista';

        $message = json_encode(
            [
                'sacador_avalista' => [
                    'pessoa' => [
                        'nome_pessoa' => $data['codigo_tipo_desconto'],
                        'tipo_pessoa' => [
                            'codigo_tipo_pessoa' => $data['codigo_tipo_pessoa'],
                            'numero_cadastro_nacional_pessoa_juridica' => $data['numero_cadastro_nacional_pessoa_juridica'],
                        ],
                    ],
                    'endereco' => [
                        'nome_logradouro' => $data['nome_logradouro'],
                        'nome_bairro' => $data['nome_bairro'],
                        'nome_cidade' => $data['nome_cidade'],
                        'sigla_uf' => $data['sigla_uf'],
                        'numero_cep' => $data['numero_cep'],
                    ],
                ],
            ]
        );

        return tap(
            parent::$http->path(self::$endPoint, $message)
                ->throw()
                ->toArray(),
            fn ($response) => Logging::logResponse($response, 'itau', 'bank')
    );

    }

}
