<?php

namespace App\Services\Banks\Itau\Methods;

trait Baixa
{

    private string $endPoint;

    public function efetuarBaixa(array $data): array
    {

        $this->endPoint = '/boletos/' . $data['id_boleto'] . '/baixa';

        return parent::$http->path(self::$endPoint);

    }

}
