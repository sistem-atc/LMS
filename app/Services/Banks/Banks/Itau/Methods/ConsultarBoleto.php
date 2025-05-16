<?php

namespace App\Services\Banks\Banks\Itau\Methods;

trait ConsultarBoleto
{
    private string $endPoint;

    public function consulta(array $data): array
    {

        if (!array_key_exists('boleto_number', $data)) {
            throw new \Exception('O campo boleto_number é obrigatório');
        }

        $this->endPoint = '/boletos?id_beneficiario=' . $this->id_beneficiario .
            '&codigo_carteira=' . $this->carteira . '&nosso_numero=' .
            data_get($data, 'boleto_number', '');

        return $this->pendingRequest->patch(self::$endPoint)->json()();

    }

}
