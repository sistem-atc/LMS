<?php

namespace App\Services\Banks\Itau\Methods;

trait SeuNumero
{

    private static string $endPoint;

    public static function consultaSeuNumero(array $data): array
    {

        self::$endPoint = '/boletos/' . $data['id_boleto'] . '/seu_numero';

        $message = json_encode(
            [
                'texto_seu_numero' => $data['texto_seu_numero'],
            ]
        );

        return parent::$http->path(self::$endPoint, $message)
            ->throw()
            ->toArray();

    }
}
