<?php

namespace App\Services\ConsultaCnpj;

use Exception;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use App\Services\ConsultaCnpj\Entities\MapCnpj;

class ConsultaCnpj
{

    public static function consulta($cnpj): Collection
    {
        try {
            return
                self::transform(Http::pool(fn (Pool $pool) => [
                    $pool->as('publicacnpj')->get('https://publica.cnpj.ws/cnpj/' . $cnpj),
                    $pool->as('opencnpj')->get('https://open.cnpja.com/office/' . $cnpj),
            ]));
        } catch (Exception $e) {
            return (object) [
                'error' => 'Erro ao consultar o CNPJ: ' . $e->getMessage(),
            ];
        }
    }

    private static function transform(mixed $json): Collection
    {
        return collect($json)
                ->map(fn ($items) => new MapCnpj($items));
    }

}
