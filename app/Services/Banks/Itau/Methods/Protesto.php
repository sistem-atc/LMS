<?php

namespace App\Services\Banks\Itau\Methods;

use App\Logs\Logging;

trait Protesto
{

    private static string $endPoint;

    public static function protestar(array $data): array
    {

        self::$endPoint = '/boletos/' . $data['id_boleto'] . '/protesto';

        $message = json_encode(
            [
                'protesto' => [
                    'codigo_tipo_protesto' => $data['codigo_tipo_protesto'],
                    'quantidade_dias_protesto' => $data['quantidade_dias_protesto'],
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
