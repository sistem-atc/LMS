<?php

namespace App\Services\Banks\Banks\Itau\Methods;

trait Baixa
{

    private string $endPoint;

    public function efetuarBaixa(array $data): array
    {

        $this->endPoint = '/boletos/' . $data['id_boleto'] . '/baixa';

        return $this->pendingRequest->path(self::$endPoint);

    }

}
