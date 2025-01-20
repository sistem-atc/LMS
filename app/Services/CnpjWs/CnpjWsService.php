<?php

namespace App\Services\CnpjWs;

use App\Services\CnpjWs\Entities\CnpjWs;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

/**
 * ViaCep Api
 * Informe o Cep na instancia da classe
 * https://publica.cnpj.ws/cnpj/CNPJ
 */

class CnpjWsService
{

    public static function consultaCNPJ($cnpj): Collection
    {
        return self::transform(Http::get('https://publica.cnpj.ws/cnpj/'. $cnpj)->json());
    }

    private static function transform(mixed $json): Collection
    {
        return collect($json)
                ->map(fn ($items) => new CnpjWs($items));
    }

}
