<?php

namespace App\Services\Banks\Itau\Methods;

trait DataLimitePagamento
{

    private static string $endPoint;

    public static function alterarDataLimitePagamento(array $data): array
    {

        self::$endPoint = '/boletos/' . $data['id_boleto'] . '/data_limite_pagamento';

        $message = json_encode(
            [
                'data_limite_pagamento' => $data['data_limite_pagamento']->format('y-m-d'),
            ]
        );

        return parent::$http->path(self::$endPoint, $message)
            ->throw()
            ->toArray();

    }

}
