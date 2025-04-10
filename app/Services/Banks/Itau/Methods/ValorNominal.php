<?php

namespace App\Services\Banks\Itau\Methods;

use App\Services\Utils\Banks\Logs\Logging;

trait ValorNominal
{

    private static string $endPoint;

    public static function alteraValorNominal(array $data): array
    {

        self::$endPoint = '/boletos/' . $data['id_boleto'] . '/valor_nominal';

        $message = json_encode(
            [
                'valor_titulo' => $data['valor_titulo'],
            ]
        );

        return tap(
            parent::$http->path(self::$endPoint, $message)
                ->throw()
                ->toArray(),
            fn ($response) => Logging::logResponse($response, 'itau')
    );

    }

}
