<?php

namespace App\Services\Banks\Banks\Itau\Methods;

trait Negativacao
{

    private string $endPoint;

    public function negativar(array $data): array
    {

        $this->endPoint = '/boletos/' . $data['id_boleto'] . '/negativacao';

        $message = json_encode(
            [
                'negativacao' => [
                    'codigo_tipo_negativacao' => $data['codigo_tipo_negativacao'],
                    'quantidade_dias_negativacao' => $data['quantidade_dias_negativacao'],
                ],
            ]
        );

        return $this->pendingRequest->patch(self::$endPoint, $message)->json();

    }

}
