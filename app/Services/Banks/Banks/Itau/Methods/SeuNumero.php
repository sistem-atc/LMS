<?php

namespace App\Services\Banks\Banks\Itau\Methods;

trait SeuNumero
{

    private string $endPoint;

    public function consultaSeuNumero(array $data): array
    {

        $this->endPoint = '/boletos/' . $data['id_boleto'] . '/seu_numero';

        $message = json_encode(
            [
                'texto_seu_numero' => $data['texto_seu_numero'],
            ]
        );

        return $this->pendingRequest->patch(self::$endPoint, $message)->json();

    }
}
