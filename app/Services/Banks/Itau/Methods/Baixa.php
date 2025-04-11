<?php

namespace App\Services\Banks\Itau\Methods;

use App\Logs\Logging;

trait Baixa
{

    private static string $endPoint;

    public static function efetuarBaixa(array $data): array
    {

        self::$endPoint = '/boletos/' . $data['id_boleto'] . '/baixa';

        return tap(
            parent::$http->path(self::$endPoint)
                ->throw()
                ->toArray(),
            fn ($response) => Logging::logResponse($response, 'itau', 'bank')
    );

    }

}
