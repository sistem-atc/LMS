<?php

namespace App\Services\ConsultaCep;

use Exception;
use GuzzleHttp\Promise\Utils;
use Illuminate\Support\Facades\Http;
use App\Services\ConsultaCep\DTO\CepDTO;

class ConsultaCep
{

    public static function consultaCEP($cep): CepDTO
    {

        $clients = [
            'viacep' => 'https://viacep.com.br/ws/' . $cep . '/json/',
            'brasilaberto' => 'https://api.brasilaberto.com/v1/zipcode/' . $cep,
            'opencep' => 'https://opencep.com.br/v1/' . $cep,
            'brasilapi' => 'https://brasilapi.com.br/api/cep/v2/' . $cep,
            'apicep' => 'https://cdn.apicep.com/file/apicep/' . substr_replace($cep, '-', 5, 0) . '.json',
        ];

        try {
            $promises = [];
            foreach ($clients as $name => $url) {
                $promises[$name] = Http::async()->get($url);
            }

            $response = Utils::any($promises)->wait();

            foreach ($promises as $name => $promise) {
                if ($promise->getState() === 'fulfilled') {
                    $successfulResponse = $promise->wait();
                    if ($successfulResponse->successful()) {
                        return self::transform($successfulResponse->json());
                    }
                }
            }
        } catch (Exception $e) {
            return self::transform([
                'error' => 'Erro ao consultar o CEP: ' . $e->getMessage(),
            ]);
        }

        return self::transform([
            'error' => 'Consulta não efetuada.',
        ]);

    }

    private static function transform(mixed $json): CepDTO
    {
        return new CepDTO($json);
    }
}
