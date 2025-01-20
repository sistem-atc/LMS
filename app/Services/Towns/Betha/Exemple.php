<?php

namespace App\Services\Towns\Betha;

use App\Models\CitySetting;
use Illuminate\Support\Carbon;
use App\Services\Utils\Towns\Interfaces\ExcludeSelectInterface;

class Exemple implements ExcludeSelectInterface
{

    protected function CancelarNfse(): void
    {

        $arrayData = [
            'Numero' => '123456',
            'Cnpj' => '12345678901234',
            'InscricaoMunicipal' => '1234567890',
            'CodigoMunicipio' => '123456',
            'CodigoCancelamento' => '123456',
        ];

        $ibgeCode = '4112108';
        $class = CitySetting::where('ibge', $ibgeCode)->first();
        $betha = app($class->class_path, ['configLoader' => $class->toArray()]);

        dd($betha->CancelarNfse($arrayData));

    }

    protected function ConsultarLoteRps(): void
    {

        $arrayData = [
            'Cnpj' => '12345678901234',
            'InscricaoMunicipal' => '1234567890',
            'Protocolo' => '123456',
        ];

        $ibgeCode = '4112108';
        $class = CitySetting::where('ibge', $ibgeCode)->first();
        $betha = app($class->class_path, ['configLoader' => $class->toArray()]);

        dd($betha->ConsultarLoteRps($arrayData));

    }

    protected function ConsultarNfseFaixa(): void
    {

        $arrayData = [
            'Cnpj' => '12345678901234',
            'InscricaoMunicipal' => '1234567890',
            'NumeroNfseInicial' => '123456',
            'Pagina' => '1',
        ];

        $ibgeCode = '4112108';
        $class = CitySetting::where('ibge', $ibgeCode)->first();
        $betha = app($class->class_path, ['configLoader' => $class->toArray()]);

        dd($betha->ConsultarNfseFaixa($arrayData));

    }

    protected function ConsultarNfsePorRps(): void
    {

        $arrayData = [
            'Numero' => '123456',
            'Serie' => '001',
            'Tipo' => '1',
            'Cnpj' => '12345678901234',
            'InscricaoMunicipal' => '1234567890',
        ];

        $ibgeCode = '4112108';
        $class = CitySetting::where('ibge', $ibgeCode)->first();
        $betha = app($class->class_path, ['configLoader' => $class->toArray()]);

        dd($betha->ConsultarNfsePorRps($arrayData));

    }

    protected function ConsultarNfseServicoPrestado(): void
    {

        $arrayData = [
            'Cnpj' => '12345678901234',
            'InscricaoMunicipal' => '1234567890',
            'DataInicial' => Carbon::now()->subMonth()->format('Y-m-d'),
            'DataFinal' => Carbon::now()->format('Y-m-d'),
            'Pagina' => '1',
        ];

        $ibgeCode = '4112108';
        $class = CitySetting::where('ibge', $ibgeCode)->first();
        $betha = app($class->class_path, ['configLoader' => $class->toArray()]);

        dd($betha->ConsultarNfseServicoPrestado($arrayData));

    }

    protected function ConsultarNfseServicoTomado(): void
    {

        $arrayData = [
            'NumeroNfse' => '123456',
            'PeriodoEmissao' => [
                'DataInicial' => Carbon::now()->subMonth()->format('Y-m-d'),
                'DataFinal' => Carbon::now()->format('Y-m-d'),
            ],
            'Prestador' => [
                'Cnpj' => '12345678901234',
                'InscricaoMunicipal' => '1234567890',
            ],
            'Pagina' => '1',
        ];

        $ibgeCode = '4112108';
        $class = CitySetting::where('ibge', $ibgeCode)->first();
        $betha = app($class->class_path, ['configLoader' => $class->toArray()]);

        dd($betha->ConsultarNfseServicoTomado($arrayData));

    }

    protected function GerarNfse(): void
    {

        $arrayData = [
            'Rps' => [
                'Numero' => '123456',
                'Serie' => '001',
                'Tipo' => '1',
                'DataEmissao' => Carbon::now()->format('Y-m-d'),
                'Status' => '1',
                'Competencia' => Carbon::now()->format('Y-m-d'),
                'Valores' => [
                    'ValorServicos' => '123456',
                    'ValorDeducoes' => '123456',
                    'ValorPis' => '123456',
                    'ValorCofins' => '123456',
                    'ValorInss' => '123456',
                    'ValorIr' => '123456',
                    'ValorCsll' => '123456',
                    'OutrasRetencoes' => '123456',
                    'ValorIss' => '123456',
                    'Aliquota' => '123456',
                    'DescontoIncondicionado' => '123456',
                    'DescontoCondicionado' => '123456',
                ],
                'IssRetido' => '1',
                'ResponsavelRetencao' => '1',
                'ItemListaServico' => '1',
                'CodigoCnae' => '1',
                'CodigoTributacaoMunicipio' => '1',
                'Discriminacao' => '1',
                'CodigoMunicipio' => '1',
                'CodigoPais' => '1',
                'ExigibilidadeIss' => '1',
                'MunicipioIncidencia' => '1',
                'NumeroProcesso' => '1',
                'Prestador' => [
                    'Cnpj' => '12345678901234',
                    'InscricaoMunicipal' => '1234567890',
                ],
                'Tomador' => [
                    'Cnpj' => '12345678901234',
                    'InscricaoMunicipal' => '1234567890',
                    'RazaoSocial' => 'Empresa Teste',
                    'Endereco' => [
                        'Endereco' => 'Rua Teste',
                        'Numero' => '123',
                        'Complemento' => 'Ap 123',
                        'Bairro' => 'Bairro Teste',
                        'CodigoMunicipio' => '1',
                        'Uf' => 'PR',
                        'CodigoPais' => '1',
                        'Cep' => '85800000',
                    ],
                    'Contato' => [
                        'Telefone' => '1234567890',
                        'Email' => 'teste@teste.com',
                    ],
                ],
                'RegimeEspecialTributacao' => '1',
                'OptanteSimplesNacional' => '1',
                'IncentivoFiscal' => '1',
            ],
        ];

        $ibgeCode = '4112108';
        $class = CitySetting::where('ibge', $ibgeCode)->first();
        $betha = app($class->class_path, ['configLoader' => $class->toArray()]);

        dd($betha->GerarNfse($arrayData));

    }

    protected function RecepcionarLoteRps(): void
    {

        $arrayData = [
            'ListaRps' => [
                'Rps' => [
                    'Numero' => '123456',
                    'Serie' => '001',
                    'Tipo' => '1',
                    'DataEmissao' => Carbon::now()->format('Y-m-d'),
                    'Status' => '1',
                    'Competencia' => Carbon::now()->format('Y-m-d'),
                    'Valores' => [
                        'ValorServicos' => '123456',
                        'ValorDeducoes' => '123456',
                        'ValorPis' => '123456',
                        'ValorCofins' => '123456',
                        'ValorInss' => '123456',
                        'ValorIr' => '123456',
                        'ValorCsll' => '123456',
                        'OutrasRetencoes' => '123456',
                        'ValorIss' => '123456',
                        'Aliquota' => '123456',
                        'DescontoIncondicionado' => '123456',
                        'DescontoCondicionado' => '123456',
                    ],
                    'IssRetido' => '1',
                    'ResponsavelRetencao' => '1',
                    'ItemListaServico' => '1',
                    'CodigoCnae' => '1',
                    'CodigoTributacaoMunicipio' => '1',
                    'Discriminacao' => '1',
                    'CodigoMunicipio' => '1',
                    'CodigoPais' => '1',
                    'ExigibilidadeIss' => '1',
                    'MunicipioIncidencia' => '1',
                    'NumeroProcesso' => '1',
                    'Prestador' => [
                        'Cnpj' => '12345678901234',
                        'InscricaoMunicipal' => '1234567890',
                    ],
                    'Tomador' => [
                        'Cnpj' => '12345678901234',
                        'InscricaoMunicipal' => '1234567890',
                        'RazaoSocial' => 'Empresa Teste',
                        'Endereco' => [
                            'Endereco' => 'Rua Teste',
                            'Numero' => '123',
                            'Complemento' => 'Ap 123',
                            'Bairro' => 'Bairro Teste',
                            'CodigoMunicipio' => '1',
                            'Uf' => 'PR',
                            'CodigoPais' => '1',
                            'Cep' => '85800000',
                        ],
                        'Contato' => [
                            'Telefone' => '1234567890',
                            'Email' => 'teste@teste.com',
                        ],
                    ],
                    'RegimeEspecialTributacao' => '1',
                    'OptanteSimplesNacional' => '1',
                    'IncentivoFiscal' => '1',
                ],
            ],
            'NumeroLote' => '1',
            'CpfCnpj' => [
                'Cnpj' => '12345678901234',
            ],
            'InscricaoMunicipal' => '1234567890',
        ];

        $ibgeCode = '4112108';
        $class = CitySetting::where('ibge', $ibgeCode)->first();
        $betha = app($class->class_path, ['configLoader' => $class->toArray()]);

        dd($betha->RecepcionarLoteRps($arrayData));

    }

    protected function RecepcionarLoteRpsSincrono(): void
    {

        $arrayData = [
            'ListaRps' => [
                'Rps' => [
                    'Numero' => '123456',
                    'Serie' => '001',
                    'Tipo' => '1',
                    'DataEmissao' => Carbon::now()->format('Y-m-d'),
                    'Status' => '1',
                    'Competencia' => Carbon::now()->format('Y-m-d'),
                    'Valores' => [
                        'ValorServicos' => '123456',
                        'ValorDeducoes' => '123456',
                        'ValorPis' => '123456',
                        'ValorCofins' => '123456',
                        'ValorInss' => '123456',
                        'ValorIr' => '123456',
                        'ValorCsll' => '123456',
                        'OutrasRetencoes' => '123456',
                        'ValorIss' => '123456',
                        'Aliquota' => '123456',
                        'DescontoIncondicionado' => '123456',
                        'DescontoCondicionado' => '123456',
                    ],
                    'IssRetido' => '1',
                    'ResponsavelRetencao' => '1',
                    'ItemListaServico' => '1',
                    'CodigoCnae' => '1',
                    'CodigoTributacaoMunicipio' => '1',
                    'Discriminacao' => '1',
                    'CodigoMunicipio' => '1',
                    'CodigoPais' => '1',
                    'ExigibilidadeIss' => '1',
                    'MunicipioIncidencia' => '1',
                    'NumeroProcesso' => '1',
                    'Prestador' => [
                        'Cnpj' => '12345678901234',
                        'InscricaoMunicipal' => '1234567890',
                    ],
                    'Tomador' => [
                        'Cnpj' => '12345678901234',
                        'InscricaoMunicipal' => '1234567890',
                        'RazaoSocial' => 'Empresa Teste',
                        'Endereco' => [
                            'Endereco' => 'Rua Teste',
                            'Numero' => '123',
                            'Complemento' => 'Ap 123',
                            'Bairro' => 'Bairro Teste',
                            'CodigoMunicipio' => '1',
                            'Uf' => 'PR',
                            'CodigoPais' => '1',
                            'Cep' => '85800000',
                        ],
                        'Contato' => [
                            'Telefone' => '1234567890',
                            'Email' => 'teste@teste.com',
                        ],
                    ],
                    'RegimeEspecialTributacao' => '1',
                    'OptanteSimplesNacional' => '1',
                    'IncentivoFiscal' => '1',
                ],
            ],
            'NumeroLote' => '1',
            'CpfCnpj' => [
                'Cnpj' => '12345678901234',
            ],
            'InscricaoMunicipal' => '1234567890',
        ];

        $ibgeCode = '4112108';
        $class = CitySetting::where('ibge', $ibgeCode)->first();
        $betha = app($class->class_path, ['configLoader' => $class->toArray()]);

        dd($betha->RecepcionarLoteRpsSincrono($arrayData));

    }

    protected function SubstituirNfse(): void
    {

        $arrayData = [
            'Numero' => '123456',
            'Cnpj' => '12345678901234',
            'InscricaoMunicipal' => '1234567890',
            'CodigoMunicipio' => '123456',
            'Rps' => [
                'Numero' => '123456',
                'Serie' => '001',
                'Tipo' => '1',
                'DataEmissao' => Carbon::now()->format('Y-m-d'),
                'Status' => '1',
                'RpsSubstituido' => [
                    'Numero' => '123456',
                    'Serie' => '001',
                    'Tipo' => '1',
                ],
                'Competencia' => Carbon::now()->format('Y-m-d'),
                'Valores' => [
                    'ValorServicos' => '123456',
                    'ValorDeducoes' => '123456',
                    'ValorPis' => '123456',
                    'ValorCofins' => '123456',
                    'ValorInss' => '123456',
                    'ValorIr' => '123456',
                    'ValorCsll' => '123456',
                    'OutrasRetencoes' => '123456',
                    'ValorIss' => '123456',
                    'Aliquota' => '123456',
                    'DescontoIncondicionado' => '123456',
                    'DescontoCondicionado' => '123456',
                ],
                'IssRetido' => '1',
                'ResponsavelRetencao' => '1',
                'ItemListaServico' => '1',
                'CodigoCnae' => '1',
                'CodigoTributacaoMunicipio' => '1',
                'Discriminacao' => '1',
                'CodigoMunicipio' => '1',
                'CodigoPais' => '1',
                'ExigibilidadeIss' => '1',
                'MunicipioIncidencia' => '1',
                'NumeroProcesso' => '1',
                'Prestador' => [
                    'Cnpj' => '12345678901234',
                    'InscricaoMunicipal' => '1234567890',
                ],
                'Tomador' => [
                    'Cnpj' => '12345678901234',
                    'InscricaoMunicipal' => '1234567890',
                    'RazaoSocial' => 'Empresa Teste',
                    'Endereco' => [
                        'Endereco' => 'Rua Teste',
                        'Numero' => '123',
                        'Complemento' => 'Ap 123',
                        'Bairro' => 'Bairro Teste',
                        'CodigoMunicipio' => '1',
                        'Uf' => 'PR',
                        'CodigoPais' => '1',
                        'Cep' => '85800000',
                    ],
                    'Contato' => [
                        'Telefone' => '1234567890',
                        'Email' => 'teste@teste.com',
                    ],
                ],
                'RegimeEspecialTributacao' => '1',
                'OptanteSimplesNacional' => '1',
                'IncentivoFiscal' => '1',
            ],

        ];

        $ibgeCode = '4112108';
        $class = CitySetting::where('ibge', $ibgeCode)->first();
        $betha = app($class->class_path, ['configLoader' => $class->toArray()]);

        dd($betha->SubstituirNfse($arrayData));

    }

}
