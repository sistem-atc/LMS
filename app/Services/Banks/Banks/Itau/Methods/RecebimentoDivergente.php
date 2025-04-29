<?php

namespace App\Services\Banks\Banks\Itau\Methods;

trait RecebimentoDivergente
{

    private string $endPoint;

    public function recebimentoDivergente(array $data): array
    {

        $this->endPoint = '/boletos/' . $data['id_boleto'] . '/recebimento_divergente';

        $message = json_encode(
            [
                'recebimento_divergente' => [
                    'codigo_tipo_autorizacao' => $data['codigo_tipo_autorizacao'],
                    'percentual_minimo' => $data['percentual_minimo'],
                    'percentual_maximo' => $data['percentual_maximo'],
                ],
            ]
        );

        return $this->pendingRequest->path(self::$endPoint, $message);

    }

}
