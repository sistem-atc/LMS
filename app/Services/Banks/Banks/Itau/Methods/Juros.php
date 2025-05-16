<?php

namespace App\Services\Banks\Banks\Itau\Methods;

trait Juros
{

    private string $endPoint;

    public function alterarJuros(array $data): array
    {

        $this->endPoint = '/boletos/' . $data['id_boleto'] . '/juros';

        $message = json_encode(
            [
                'juros' => [
                    'codigo_tipo_juros' => $data['codigo_tipo_juros'],
                    'quantidade_dias_juros' => $data['quantidade_dias_juros'],
                    'percentual_juros' => $data['percentual_juros'],
                ]
            ]
        );

        return $this->pendingRequest->patch(self::$endPoint, $message)->json();

    }

}
