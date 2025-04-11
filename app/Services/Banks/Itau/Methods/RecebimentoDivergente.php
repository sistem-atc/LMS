<?php

namespace App\Services\Banks\Itau\Methods;

use App\Logs\Logging;

trait RecebimentoDivergente
{

    private static string $endPoint;

    public static function recebimentoDivergente(array $data): array
    {

        self::$endPoint = '/boletos/' . $data['id_boleto'] . '/recebimento_divergente';

        $message = json_encode(
            [
                'recebimento_divergente' => [
                    'codigo_tipo_autorizacao' => $data['codigo_tipo_autorizacao'],
                    'percentual_minimo' => $data['percentual_minimo'],
                    'percentual_maximo' => $data['percentual_maximo'],
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
