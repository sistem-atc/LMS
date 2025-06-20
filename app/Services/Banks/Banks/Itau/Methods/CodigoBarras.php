<?php

namespace App\Services\Banks\Banks\Itau\Methods;

trait CodigoBarras
{

    public function makeCodeBar(array $data): string
    {
        $codigoBarras = sprintf(
            '%s%s%s%s%s%s%s%s%s',
            $data['bankCode'],
            $data['wallet'],
            str_pad($data['agencia'], 4, '0', STR_PAD_LEFT),
            str_pad($data['conta'], 5, '0', STR_PAD_LEFT),
            $data['conta_dv'],
            $data['nossoNumero'],
            $data['valor'],
            $data['vencimento'],
            $this->calculateChecksum($data)
        );

        return $codigoBarras;
    }

}
