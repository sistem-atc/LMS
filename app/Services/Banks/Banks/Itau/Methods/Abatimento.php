<?php

namespace App\Services\Banks\Banks\Itau\Methods;

trait Abatimento
{

    private string $endPoint;

    public function incluirAbatimento(array $data): array
    {

        $this->endPoint = '/boletos/' . $data['id_boleto'] . '/abatimento';

        $message = json_encode(
            [
                'valor_abatimento' => $data['valor_abatimento'],
            ]
        );

        return $this->pendingRequest->path(self::$endPoint, $message);

    }

}
