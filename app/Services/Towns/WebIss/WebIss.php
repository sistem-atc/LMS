<?php

namespace App\Services\Towns\WebIss;

use SimpleXMLElement;
use App\Enums\HttpMethod;
use App\Services\Utils\Towns\Bases\LinkTownBase;
use App\Services\Utils\Towns\Interfaces\DevelopInterface;
use App\Services\Utils\Towns\Interfaces\LinkTownsInterface;
use Illuminate\Support\Facades\Validator;

class WebIss extends LinkTownBase implements LinkTownsInterface,DevelopInterface
{

    protected static $verb = HttpMethod::POST;
    private static SimpleXMLElement $headMsg;
    private static string|int|array|null $connection;
    private static SimpleXMLElement $mountMessage;
    private static string $operation;

    protected static $headers = [];

    public function gerarNota(array $data): string|int|array
    {
        return self::GerarNfse($data);
    }

    public function consultarNota(array $data): string|int|array
    {
        return self::ConsultarNfse($data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return self::CancelarNfse($data);
    }

    public function __construct($codeIbge)
    {
        parent::__construct($codeIbge);
        self::$headMsg = self::composeHeader();
        self::$connection = self::Conection(parent::$url, self::$mountMessage->asXML(), static::$headers, self::$verb, false);
    }

    public static function CancelarNfse(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'Numero' => 'required|string',
            'Cnpj' => 'required|digits:14|regex:/^\d{14}$/',
            'InscricaoMunicipal' => 'required|string|max:20',
            'CodigoMunicipio' => 'required|digits:4',
            'CodigoCancelamento' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        self::$operation = __FUNCTION__;
        $dataMsg = self::composeMessage(self::$operation);
        self::mountMensage($dataMsg);

        return self::$connection;

    }

    public static function ConsultarLoteRps(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'Cnpj' => 'required|digits:14|regex:/^\d{14}$/',
            'InscricaoMunicipal' => 'required|string|max:20',
            'Protocolo' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        self::$operation = __FUNCTION__;
        $dataMsg = self::composeMessage(self::$operation);
        self::mountMensage($dataMsg);

        return self::$connection;

    }

    public static function ConsultarNfseFaixa(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'Cnpj' => 'required|digits:14|regex:/^\d{14}$/',
            'InscricaoMunicipal' => 'required|string|max:20',
            'NumeroNfseInicial' => 'required|string|max:50',
            'Pagina' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        self::$operation = __FUNCTION__;
        $dataMsg = self::composeMessage(self::$operation);
        self::mountMensage($dataMsg);

        return self::$connection;

    }

    public static function ConsultarNfse(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'Cnpj' => 'required|digits:14|regex:/^\d{14}$/',
            'InscricaoMunicipal' => 'required|string|max:20',
            'NumeroNfse' => 'required|string|max:50',
            'DataInicial' => 'required|date|date_format:Y-m-d',
            'DataFinal' => 'required|date|date_format:Y-m-d',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        self::$operation = __FUNCTION__;
        $dataMsg = self::composeMessage(self::$operation);
        self::mountMensage($dataMsg);

        return self::$connection;

    }

    public static function ConsultarNfsePorRps(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'Numero' => 'required|string|max:15',
            'Serie' => 'required|string|max:3',
            'Tipo' => 'required|string|max:1',
            'Cnpj' => 'required|digits:14|regex:/^\d{14}$/',
            'InscricaoMunicipal' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        self::$operation = __FUNCTION__;
        $dataMsg = self::composeMessage(self::$operation);
        self::mountMensage($dataMsg);

        return self::$connection;

    }

    public static function ConsultarNfseServicoPrestado(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'Cnpj' => 'required|digits:14|regex:/^\d{14}$/',
            'InscricaoMunicipal' => 'required|string|max:20',
            'DataInicial' => 'required|date|date_format:Y-m-d',
            'DataFinal' => 'required|date|date_format:Y-m-d',
            'Pagina' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        self::$operation = __FUNCTION__;
        $dataMsg = self::composeMessage(self::$operation);
        self::mountMensage($dataMsg);

        return self::$connection;

    }

    public static function ConsultarNfseServicoTomado(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'Cnpj_Consulente' => 'required|digits:14|regex:/^\d{14}$/',
            'InscricaoMunicipal_Consulente' => 'required|string|max:20',
            'NumeroNfse' => 'required|string|max:50',
            'DataInicial_Emissao' => 'required|date|date_format:Y-m-d',
            'DataFinal_Emissao' => 'required|date|date_format:Y-m-d',
            'DataInicial_Competencia' => 'required|date|date_format:Y-m-d',
            'DataFinal_Competencia' => 'required|date|date_format:Y-m-d',
            'Cnpj_Prestador' => 'required|digits:14|regex:/^\d{14}$/',
            'InscricaoMunicipal_Prestador' => 'required|string|max:20',
            'Cnpj_Tomador' => 'required|digits:14|regex:/^\d{14}$/',
            'InscricaoMunicipal_Tomador' => 'required|string|max:20',
            'Cnpj_Intermediario' => 'required|digits:14|regex:/^\d{14}$/',
            'InscricaoMunicipal_Intermediario' => 'required|string|max:20',
            'Pagina' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        self::$operation = __FUNCTION__;
        $dataMsg = self::composeMessage(self::$operation);
        self::mountMensage($dataMsg);

        return self::$connection;

    }

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

        return self::$connection;

    }

    public static function ConsultarSituacaoLoteRPS(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'Cnpj' => 'required|digits:14|regex:/^\d{14}$/',
            'InscricaoMunicipal' => 'required|string|max:20',
            'Protocolo' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        self::$operation = __FUNCTION__;
        $dataMsg = self::composeMessage(self::$operation);
        self::mountMensage($dataMsg);

        return self::$connection;

    }

    public static function RecepcionarLoteRps(array $data): string|int|array
    {

        self::$operation = __FUNCTION__;
        $dataMsg = self::composeMessage(self::$operation);
        self::mountMensage($dataMsg);

        return self::$connection;

    }

    public static function RecepcionarLoteRpsSincrono(array $data): string|int|array
    {

        self::$operation = __FUNCTION__;
        $dataMsg = self::composeMessage(self::$operation);
        self::mountMensage($dataMsg);

        return self::$connection;

    }

    public static function SubstituirNfse(array $data): string|int|array
    {

        self::$operation = __FUNCTION__;
        $dataMsg = self::composeMessage(self::$operation);
        self::mountMensage($dataMsg);

        return self::$connection;

    }

    private static function mountMensage(SimpleXMLElement $dataMsg): void
    {

        self::$mountMessage = parent::assembleMessage(self::$operation);
        self::$mountMessage->registerXPathNamespace('soapenv', parent::getNamespace());

        if (self::getVersion() === null) {
            $cabecMsg = self::$mountMessage->xpath('//e:Nfsecabecmsg')[0];
            $dadosMsg = self::$mountMessage->xpath('//e:Nfsedadosmsg')[0];
        } else {
            $cabecMsg = self::$mountMessage->xpath('//cabec')[0];
            $dadosMsg = self::$mountMessage->xpath('//msg')[0];
        }

        $dom = dom_import_simplexml($cabecMsg);
        $dom->appendChild($dom->ownerDocument->createCDATASection(self::$headMsg->asXml()));
        $dom = dom_import_simplexml($dadosMsg);
        $dom->appendChild($dom->ownerDocument->createCDATASection($dataMsg->asXml()));

    }

}
