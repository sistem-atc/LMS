<?php

namespace App\Services\Banks\Banks\Itau\Methods;

trait DataLimitePagamento
{

    private string $endPoint;

    public function alterarDataLimitePagamento(array $data): array
    {

        $this->endPoint = '/boletos/' . $data['id_boleto'] . '/data_limite_pagamento';

        $message = json_encode(
            [
                'data_limite_pagamento' => $data['data_limite_pagamento']->format('y-m-d'),
            ]
        );

        return $this->pendingRequest->patch(self::$endPoint, $message)->json();

    }

}
