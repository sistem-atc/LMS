<?php

namespace App\Services\Banks\Itau\Methods;

use App\Services\Utils\Banks\Logs\Logging;

trait ConsultarBoleto
{
    private static string $endPoint;

    public static function consulta(array $data): array
    {

        if (!array_key_exists('boleto_number', $data)) {
            throw new \Exception('O campo boleto_number é obrigatório');
        }

        self::$endPoint = '/boletos?id_beneficiario=' . parent::$id_beneficiario .
            '&codigo_carteira=' . parent::$carteira . '&nosso_numero=' .
            data_get($data, 'boleto_number', '');

            return tap(
                 parent::$http->path(self::$endPoint)
                    ->throw()
                    ->toArray(),
                fn ($response) => Logging::logResponse($response, 'itau')
        );

    }

}
