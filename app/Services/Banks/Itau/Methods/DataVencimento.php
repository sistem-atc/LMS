<?php

namespace App\Services\Banks\Itau\Methods;

use App\Services\Utils\Banks\Logs\Logging;

trait DataVencimento
{

    private static string $endPoint;

    public static function alterarVencimento(array $data): array
    {

        self::$endPoint = '/boletos/' . $data['id_boleto'] . '/data_vencimento';

        $message = json_encode(
            [
                'data_vencimento' => $data['data_vencimento']->format('y-m-d'),
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
