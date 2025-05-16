<?php

namespace App\Services\Banks\Banks\Itau\Methods;

trait Desconto
{

    private string $endPoint;

    public function incluirDesconto(array $data): array
    {

        $this->endPoint = '/boletos/' . $data['id_boleto'] . '/desconto';

        $message = json_encode(
            [
                'desconto' => [
                    'codigo_tipo_desconto' => $data['codigo_tipo_desconto'],
                    'descontos' => $data['descontos'],
                ],
            ]
        );

        return $this->pendingRequest->patch(self::$endPoint, $message)->json();

    }

}
