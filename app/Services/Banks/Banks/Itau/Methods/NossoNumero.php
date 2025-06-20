<?php

namespace App\Services\Banks\Banks\Itau\Methods;

trait NossoNumero
{
    public function makeOwnNumber(array $data): string
    {
        $partialNumber = $data['id'] % 100000000;
        $wallet = str_pad($data['wallet'], 3, '0', STR_PAD_LEFT);
        $ownNumber = str_pad($partialNumber, 8, '0', STR_PAD_LEFT);

        $number = "{$wallet}{$ownNumber}";

        return (string) (9 - ($this->mod11($number) % 10));
    }
}
