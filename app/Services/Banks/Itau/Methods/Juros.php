<?php

namespace App\Services\Banks\Itau\Methods;

trait Juros
{

    private static string $endPoint;

    public static function alterarJuros(array $data): array
    {

        self::$endPoint = '/boletos/' . $data['id_boleto'] . '/juros';

        $message = json_encode(
            [
                'juros' => [
                    'codigo_tipo_juros' => $data['codigo_tipo_juros'],
                    'quantidade_dias_juros' => $data['quantidade_dias_juros'],
                    'percentual_juros' => $data['percentual_juros'],
                ]
            ]
        );

        return parent::$http->path(self::$endPoint, $message)
            ->throw()
            ->toArray();

    }

}
