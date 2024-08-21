<?php

namespace App\Services\Utils\ViaCep;

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
        return Http::get('viacep.com.br/ws/'. $cep . '/json/')->json();
    }

}
