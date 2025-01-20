<?php

namespace App\Services\ConsultaCep;

use Exception;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;

class ConsultaCep
{

    public static function consultaCEP($cep): array
    {
        try {
            return Http::pool(fn (Pool $pool) => [
                $pool->as('viacep')->get('viacep.com.br/ws/' . $cep . '/json/'),
                $pool->as('brasilaberto')->get('api.brasilaberto.com/v1/zipcode/' . $cep),
                $pool->as('opencep')->get('opencep.com.br/v1/' . $cep),
                $pool->as('brasilapi')->get('brasilapi.com.br/api/cep/v2/' . $cep),
                $pool->as('apicep')->get('cdn.apicep.com/file/apicep/' . substr_replace($cep, '-', 5, 0) . '.json'),
            ]);
        } catch (Exception $e) {
            return [
                'error' => 'Erro ao consultar o CEP ' . $e,
            ];
        }
    }
}
