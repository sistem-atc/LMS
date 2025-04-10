<?php

namespace App\Services\Banks\Itau\Methods;

trait Desconto
{

    private static string $endPoint;

    public static function incluirDesconto(array $data): array
    {

        self::$endPoint = '/boletos/' . $data['id_boleto'] . '/desconto';

        $message = json_encode(
        [
                'desconto' => [
                    'codigo_tipo_desconto' => $data['codigo_tipo_desconto'],
                    'descontos' => $data['descontos'],
                ],
            ]
        );

        return parent::$http->path(self::$endPoint, $message)
            ->throw()
            ->toArray();

    }

}
