<?php

namespace App\Services\Utils\ViaCep;

use Exception;
use Illuminate\Support\Facades\Http;

/**
 * ViaCep Api
 * Informe o Cep na instancia da classe
 * https://viacep.com.br/
 */

class ViaCepService
{

    public static function consultaCEP($cep): array
    {
        try {
            return Http::get('viacep.com.br/ws/' . $cep . '/json/')->json();
        } catch (Exception $e) {
            return [
                'error' => 'Erro ao consultar o CEP ' . $e,
            ];
        }
    }
}
