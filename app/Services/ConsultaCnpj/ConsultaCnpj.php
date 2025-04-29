<?php

namespace App\Services\ConsultaCnpj;

use Exception;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;
use App\Services\ConsultaCnpj\DTO\CnpjDTO;

class ConsultaCnpj
{

    public static function consulta($cnpj): CnpjDTO
    {
        try {
            return
                self::transform(Http::pool(fn(Pool $pool) => [
                    $pool->as('publicacnpj')->get('https://publica.cnpj.ws/cnpj/' . $cnpj),
                    $pool->as('opencnpj')->get('https://open.cnpja.com/office/' . $cnpj),
                ]));
        } catch (Exception $e) {
            return (object) [
                'error' => 'Erro ao consultar o CNPJ: ' . $e->getMessage(),
            ];
        }
    }

    private static function transform(mixed $json): CnpjDTO
    {
        return new CnpjDTO($json);
    }

}
