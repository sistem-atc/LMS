<?php

namespace App\Services\Banks\Banks\Itau\Methods;

trait ValorNominal
{

    private string $endPoint;

    public function alteraValorNominal(array $data): array
    {

        $this->endPoint = '/boletos/' . $data['id_boleto'] . '/valor_nominal';

        $message = json_encode(
            [
                'valor_titulo' => $data['valor_titulo'],
            ]
        );

        return $this->pendingRequest->patch(self::$endPoint, $message)->json();

    }

}
