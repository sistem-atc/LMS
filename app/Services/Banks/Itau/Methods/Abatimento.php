<?php

namespace App\Services\Banks\Itau\Methods;

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

        return parent::$http->path(self::$endPoint, $message)
            ->throw()
            ->toArray();
    }

}
