<?php

namespace App\Services\Utils\ViaCep;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use App\Services\Utils\ViaCep\Entities\ViaCep;

/**
 * ViaCep Api
 * Informe o Cep na instancia da classe
 * https://viacep.com.br/
 */

class ViaCepService
{

    public static function consultaCEP($cep): Collection
    {
        return self::transform(
                Http::get('viacep.com.br/ws/'. $cep . '/json/')->json()
            );
    }

    private static function transform(mixed $json): Collection
    {
        return collect($json)
                ->map(fn ($ViaCep) => new ViaCep($json));
    }
}
