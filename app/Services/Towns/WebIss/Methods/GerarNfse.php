<?php

namespace App\Services\Towns\WebIss\Methods;

use SimpleXMLElement;
use Illuminate\Support\Facades\Validator;

trait GerarNfse
{
    private static string $operation;
    private static string $endpoint;
    private static SimpleXMLElement $mountMessage;

    public static function GerarNfse(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'Numero' => 'required|string|max:50',
            'Serie' => 'required|string|max:50',
            'Tipo' => 'required|in:1,2,3',
            'DataEmissao' => 'required|date',
            'Status' => 'required|in:1,2,3',
            'Competencia' => 'required|digits:6',
            'ValorServicos' => 'required|numeric',
            'ValorDeducoes' => 'nullable|numeric',
            'ValorPis' => 'nullable|numeric',
            'ValorCofins' => 'nullable|numeric',
            'ValorInss' => 'nullable|numeric',
            'ValorIr' => 'nullable|numeric',
            'ValorCsll' => 'nullable|numeric',
            'ValorIss' => 'nullable|numeric',
            'Aliquota' => 'nullable|numeric|between:0,1',
            'DescontoIncondicionado' => 'nullable|numeric',
            'DescontoCondicionado' => 'nullable|numeric',
            'IssRetido' => 'required|in:1,2',
            'ResponsavelRetencao' => 'nullable|string',
            'ItemListaServico' => 'nullable|string',
            'CodigoCnae' => 'nullable|string',
            'CodigoTributacaoMunicipio' => 'nullable|string',
            'Discriminacao' => 'nullable|string|max:255',
            'CodigoMunicipio' => 'nullable|string|max:10',
            'CodigoPais' => 'nullable|string|max:3',
            'ExigibilidadeIss' => 'nullable|string',
            'MunicipioIncidencia' => 'nullable|string',
            'NumeroProcesso' => 'nullable|string|max:50',
            'CnpjPrestador' => 'required|digits:14|regex:/^\d{14}$/',
            'InscricaoMunicipalPrestador' => 'required|string|max:20',
            'CnpjTomador' => 'nullable|digits:14|regex:/^\d{14}$/',
            'InscricaoMunicipalTomador' => 'nullable|string|max:20',
            'RazaoSocialTomador' => 'nullable|string|max:255',
            'EnderecoTomador' => 'nullable|string|max:255',
            'NumeroTomador' => 'nullable|string|max:50',
            'ComplementoTomador' => 'nullable|string|max:50',
            'BairroTomador' => 'nullable|string|max:50',
            'CodigoMunicipioTomador' => 'nullable|string|max:10',
            'UfTomador' => 'nullable|string|max:2',
            'CodigoPaisTomador' => 'nullable|string|max:3',
            'CepTomador' => 'nullable|string|max:8',
            'TelefoneTomador' => 'nullable|string|max:20',
            'EmailTomador' => 'nullable|email|max:255',
            'CnpjIntermediario' => 'nullable|digits:14|regex:/^\d{14}$/',
            'InscricaoMunicipalIntermediario' => 'nullable|string|max:20',
            'RazaoSocialIntermediario' => 'nullable|string|max:255',
            'CodigoObra' => 'nullable|string|max:50',
            'Art' => 'nullable|string|max:50',
            'RegimeEspecialTributacao' => 'nullable|string|max:10',
            'OptanteSimplesNacional' => 'nullable|in:1,2',
            'IncentivoFiscal' => 'nullable|in:1,2',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        self::$operation = __FUNCTION__;
        $dataMsg = self::composeMessage(self::$operation);
        self::mountMensage($dataMsg);

        return self::connection();

    }

}
