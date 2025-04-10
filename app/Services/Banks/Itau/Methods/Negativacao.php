<?php

namespace App\Services\Banks\Itau\Methods;

trait Negativacao
{

    private static string $endPoint;

    public static function negativar(array $data): array
    {

        self::$endPoint = '/boletos/' . $data['id_boleto'] . '/negativacao';

        $message = json_encode(
            [
                'negativacao' => [
                    'codigo_tipo_negativacao' => $data['codigo_tipo_negativacao'],
                    'quantidade_dias_negativacao' => $data['quantidade_dias_negativacao'],
                ],
            ]
        );

        return parent::$http->path(self::$endPoint, $message)
            ->throw()
            ->toArray();

    }

}
