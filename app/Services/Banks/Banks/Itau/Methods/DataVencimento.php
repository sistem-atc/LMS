<?php

namespace App\Services\Banks\Banks\Itau\Methods;

trait DataVencimento
{

    private string $endPoint;

    public function alterarVencimento(array $data): array
    {

        $this->endPoint = '/boletos/' . $data['id_boleto'] . '/data_vencimento';

        $message = json_encode(
            [
                'data_vencimento' => $data['data_vencimento']->format('y-m-d'),
            ]
        );

        return $this->pendingRequest->path(self::$endPoint, $message);

    }

}
