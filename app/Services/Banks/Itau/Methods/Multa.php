<?php

namespace App\Services\Banks\Itau\Methods;

trait Multa
{

    private string $endPoint;

    public function alterarMulta(array $data): array
    {

        $this->endPoint = '/boletos/' . $data['id_boleto'] . '/multa';

        $message = json_encode(
            [
                'multa' => [
                    'codigo_tipo_multa' => $data['codigo_tipo_multa'],
                    'quantidade_dias_multa' => $data['quantidade_dias_multa'],
                    'percentual_multa' => $data['percentual_multa'],
                ]
            ]
        );

        return parent::$http->path(self::$endPoint, $message);

    }

}
