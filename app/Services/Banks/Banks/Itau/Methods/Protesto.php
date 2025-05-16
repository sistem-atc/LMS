<?php

namespace App\Services\Banks\Banks\Itau\Methods;

trait Protesto
{

    private string $endPoint;

    public function protestar(array $data): array
    {

        $this->endPoint = '/boletos/' . $data['id_boleto'] . '/protesto';

        $message = json_encode(
            [
                'protesto' => [
                    'codigo_tipo_protesto' => $data['codigo_tipo_protesto'],
                    'quantidade_dias_protesto' => $data['quantidade_dias_protesto'],
                ],
            ]
        );

        return $this->pendingRequest->patch(self::$endPoint, $message)->json();

    }

}
