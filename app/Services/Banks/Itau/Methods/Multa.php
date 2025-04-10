<?php

namespace App\Services\Banks\Itau\Methods;

use App\Logs\Logging;

trait Multa
{

    private static string $endPoint;

    public static function alterarMulta(array $data): array
    {

        self::$endPoint = '/boletos/' . $data['id_boleto'] . '/multa';

        $message = json_encode(
            [
                'multa' => [
                    'codigo_tipo_multa' => $data['codigo_tipo_multa'],
                    'quantidade_dias_multa' => $data['quantidade_dias_multa'],
                    'percentual_multa' => $data['percentual_multa'],
                ]
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
