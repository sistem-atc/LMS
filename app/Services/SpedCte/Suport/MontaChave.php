<?php

namespace App\Services\SpedCte\Suport;

trait MontaChave
{
    private function montaChave(
        $cUF,
        $ano,
        $mes,
        $cnpj,
        $mod,
        $serie,
        $numero,
        $tpEmis,
        $codigo = ''
    ): string {

        if ($codigo == '') {
            $codigo = $numero;
        }
        $forma = "%02d%02d%02d%s%02d%03d%09d%01d%08d";
        $chave = sprintf(
            $forma,
            $cUF,
            $ano,
            $mes,
            $cnpj,
            $mod,
            $serie,
            $numero,
            $tpEmis,
            $codigo
        );

        return $chave . $this->calculaDV($chave);

    }

    public function calculaDV($chave43): string
    {
        $multiplicadores = array(2, 3, 4, 5, 6, 7, 8, 9);
        $iCount = 42;
        $somaPonderada = 0;
        while ($iCount >= 0) {
            for ($mCount = 0; $mCount < count($multiplicadores) && $iCount >= 0; $mCount++) {
                $num = (int) substr($chave43, $iCount, 1);
                $peso = (int) $multiplicadores[$mCount];
                $somaPonderada += $num * $peso;
                $iCount--;
            }
        }
        $resto = $somaPonderada % 11;
        if ($resto == '0' || $resto == '1') {
            $cDV = 0;
        } else {
            $cDV = 11 - $resto;
        }
        return (string) $cDV;
    }

}
