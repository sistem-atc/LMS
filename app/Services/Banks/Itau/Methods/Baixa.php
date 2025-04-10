<?php

namespace App\Services\Banks\Itau\Methods;

trait Baixa
{

    private static string $endPoint;

    public static function efetuarBaixa(array $data): array
    {

        self::$endPoint = '/boletos/' . $data['id_boleto'] . '/baixa';

        return parent::$http->path(self::$endPoint)
            ->throw()
            ->toArray();

    }

}
