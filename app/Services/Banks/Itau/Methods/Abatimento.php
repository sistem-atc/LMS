<?php

namespace App\Services\Banks\Itau\Methods;

use App\Logs\Logging;

trait Abatimento
{

    private static string $endPoint;

    public static function incluirAbatimento(array $data): array
    {

        self::$endPoint = '/boletos/' . $data['id_boleto'] . '/abatimento';

        $message = json_encode(
            [
                'valor_abatimento' => $data['valor_abatimento'],
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
