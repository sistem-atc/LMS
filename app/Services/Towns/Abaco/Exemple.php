<?php

namespace App\Services\Towns\Abaco;

use Carbon\Carbon;
use App\Enums\TypeRPS;
use App\Models\CitySetting;
use App\Services\Utils\Towns\Interfaces\ExcludeSelectInterface;

class Exemple implements ExcludeSelectInterface
{

    protected function recepcionarLoteRps(): void
    {

        $arrayData = [
            'idLote' => 'LOTE123456789',
            'numeroLote' => 123456789,
            'cnpj' => '18575072000122',
            'inscricaoMunicipal' => 854776,
            'qtdRps' => 1,
            'rps' => [
                [
                    'infoId' => 'RPS122',
                    'numeroRps' => 122,
                    'serieRps' => '1',
                    'tipoRps' => TypeRPS::RPS->value,
                    'dataEmissao' => '2011-01-19T12:00:00',
                    'naturezaOperacao' => 1,
                    'regimeTributacao' => 2,
                    'optanteSimplesNacional' => 2,
                    'incentivadorCultural' => 2,
                    'status' => 1,
                    'valorServicos' => 1200.00,
                    'valorDeducoes' => 0.00,
                    'valorPis' => 0.00,
                    'valorCofins' => 0.00,
                    'valorInss' => 0.00,
                    'valorIr' => 0.00,
                    'valorCsll' => 0.00,
                    'issRetido' => 1,
                    'valorIss' => 60.00,
                    'valorIssRetido' => 60.00,
                    'valorOutraRetencoes' => 0.00,
                    'baseCalculo' => 1200.00,
                    'aliquota' => 0.05,
                    'valorLiquidoNfse' => 1140.00,
                    'descontoIncodicionado' => 0.00,
                    'descontoCodicionado' => 0.00,
                    'itemListaServico' => 1101,
                    'codigoCnae' => 123,
                    'codigoTributacao' => 1101,
                    'discriminacao' => 'ESTACIONAMENTO',
                    'codigoMunicipio' => 5107040,
                    'prestador' => [
                        'cnpj' => '18575072000122',
                        'inscricaoMunicipal' => 854776,
                    ],
                    'tomador' => [
                        'cnpj' => '00584473000183',
                        'inscricaoMunicipal' => 804104,
                        'razaoSocial' => 'LAVA JATO CAMPEAO',
                        'endereco' => 'RUA BARAO DE MELGACO',
                        'numero' => '3726',
                        'complemento' => 'CENTRO',
                        'bairro' => 'CENTRO',
                        'codigoMunicipio' => 5107040,
                        'uf' => 'MT',
                        'cep' => 78000000,
                        'contato' => '65 36170774',
                        'email' => 'AAGUIAR@ABACO.COM.BR<',
                    ],
                ],
            ],
        ];

        $ibgeCode = '1302603';
        $class = CitySetting::where('ibge', $ibgeCode)->first();
        $abaco = app($class, ['codeIbge' => $ibgeCode]);

        dd($abaco->gerarNota($arrayData));
    }

    private function ConsultarSituacaoLoteRPS(): void
    {
        $arrayData = [
            'cnpj' => '18575072000122',
            'inscricaoMunicipal' => 854776,
            'protocolo' => 123456,
        ];

        $ibgeCode = 'codeIbge';
        $class = config('links-towns.' . $ibgeCode . '.class');
        $abaco = app($class, ['codeIbge' => $ibgeCode]);

        dd($abaco->gerarNota($arrayData));
    }

    private function ConsultarNfsePorRps(): void
    {
        $arrayData = [
            'cnpj' => '18575072000122',
            'inscricaoMunicipal' => 854776,
            'numero_RPS' => 123456,
            'serie_RPS' => 'A1',
            'tipo_RPS' => TypeRPS::RPS->getLabel(),
        ];

        $ibgeCode = '1302603';
        $class = CitySetting::where('ibge', $ibgeCode)->first();
        $abaco = app($class, ['codeIbge' => $ibgeCode]);

        dd($abaco->consultarNota($arrayData));
    }

    private function ConsultarLoteRps(): void
    {
        $arrayData = [
            'cnpj' => '18575072000122',
            'inscricaoMunicipal' => 854776,
            'protocolo' => 123456,
        ];

        $ibgeCode = '1302603';
        $class = CitySetting::where('ibge', $ibgeCode)->first();
        $abaco = app($class, ['codeIbge' => $ibgeCode]);

        dd($abaco->consultarNota($arrayData));
    }

    private function ConsultarNfse(): void
    {
        $arrayData = [
            'cnpj' => '18575072000122',
            'inscricaoMunicipal' => 854776,
            'dataInicial' => Carbon::now()->format('Y-m-d H:i:s'),
            'dataFinal' => Carbon::now()->format('Y-m-d H:i:s'),
        ];

        $ibgeCode = '1302603';
        $class = CitySetting::where('ibge', $ibgeCode)->first();
        $abaco = app($class, ['codeIbge' => $ibgeCode]);

        dd($abaco->consultarNota($arrayData));
    }
}
