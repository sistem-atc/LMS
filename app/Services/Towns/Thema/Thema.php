<?php

namespace App\Services\Towns\Thema;

use SimpleXMLElement;
use App\Enums\HttpMethod;
use App\Services\Utils\Towns\Bases\LinkTownBase;
use App\Services\Utils\Towns\Interfaces\DevelopInterface;
use App\Services\Utils\Towns\Interfaces\LinkTownsInterface;

class Thema extends LinkTownBase implements LinkTownsInterface,DevelopInterface
{

    protected static $verb = HttpMethod::POST;
    private static string|int|array|null $connection;
    private static SimpleXMLElement $mountMessage;
    private static string $endpoint;
    private static string $operation;
    protected static $headers;

    public static function getHeaders(): array
    {
        return [];
    }

    public function gerarNota(array $data): string|int|array
    {
        return self::RecepcionarLoteRps($data);
    }

    public function consultarNota(array $data): string|int|array
    {
        return self::ConsultarNfse($data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return self::cancelarNfse($data);
    }

    public function __construct($codeIbge)
    {
        parent::__construct($codeIbge);
        self::$connection = self::Conection(parent::$url . self::$endpoint, self::$mountMessage->asXML(), self::getHeaders(), self::$verb, false);
    }

    public function CancelarNfse(array $data): string|int|array
    {

        self::$endpoint = "NFSEcancelamento.NFSEcancelamentoHttpSoap12Endpoint/";
        self::$operation = __FUNCTION__;

        $dataMsg = self::composeMessage(self::$operation);
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg);

        return self::$connection;
    }

    public function ConsultarLoteRps(array $data): string|int|array
    {

        self::$endpoint = "NFSEconsulta.NFSEconsultaHttpSoap12Endpoint/";
        self::$operation = __FUNCTION__;

        $dataMsg = self::composeMessage(self::$operation);
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg);

        return self::$connection;
    }

    public function ConsultarNfse(array $data): string|int|array
    {

        self::$endpoint = "NFSEconsulta.NFSEconsultaHttpSoap12Endpoint/";
        self::$operation = __FUNCTION__;

        $dataMsg = self::composeMessage(self::$operation);
        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricao_municipal'];
        $dataMsg->DataInicial = $data['data_inicial'];
        $dataMsg->DataFinal = $data['data_final'];
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg);

        return self::$connection;
    }

    public function ConsultarNfsePorRps(array $data): string|int|array
    {

        self::$endpoint = "NFSEconsulta.NFSEconsultaHttpSoap12Endpoint/";
        self::$operation = __FUNCTION__;

        $dataMsg = self::composeMessage(self::$operation);
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg);

        return self::$connection;
    }

    public function ConsultarSituacaoLoteRps(array $data): string|int|array
    {

        self::$endpoint = "NFSEconsulta.NFSEconsultaHttpSoap12Endpoint/";
        self::$operation = __FUNCTION__;

        $dataMsg = self::composeMessage(self::$operation);
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg);

        return self::$connection;
    }

    public function RecepcionarLoteRps(array $data): string|int|array
    {

        self::$endpoint = "NFSEremessa.NFSEremessaHttpSoap12Endpoint/";
        self::$operation = __FUNCTION__;

        $dataMsg = self::composeMessage(self::$operation);
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg);

        return self::$connection;
    }

    public function RecepcionarLoteRpsDocumento(array $data): string|int|array
    {

        self::$endpoint = "NFSEremessa.NFSEremessaHttpSoap12Endpoint/";
        self::$operation = __FUNCTION__;

        // adicionar ao schema <ser:numeroDocumento>[NumeroDocumento]</ser:numeroDocumento>

        $dataMsg = self::composeMessage(self::$operation);
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg);

        return self::$connection;
    }

    public function RecepcionarLoteRpsLimitado(array $data): string|int|array
    {

        self::$endpoint = "NFSEremessa.NFSEremessaHttpSoap12Endpoint/";
        self::$operation = __FUNCTION__;

        $dataMsg = self::composeMessage(self::$operation);
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg);

        return self::$connection;
    }

    public function GerarGuiaFaturamentoPrestador(array $data): string|int|array
    {

        self::$endpoint = "NFSEguias.NFSEguiasHttpSoap12Endpoint/";
        self::$operation = __FUNCTION__;

        $dataMsg = self::composeMessage(self::$operation);
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg);

        return self::$connection;
    }

    public function RetornarDadosCadastrais(array $data): string|int|array
    {

        self::$endpoint = "NFSEdadosCadastrais.NFSEdadosCadastraisHttpSoap12Endpoint/";
        self::$operation = __FUNCTION__;

        self::$mountMessage = self::composeMessage(self::$operation);
        self::$mountMessage->cnpjCpf = $data['cnpj'];

        return self::$connection;
    }

    public function ListarMensagens(array $data): string|int|array
    {

        self::$endpoint = "NFSEmensagens.NFSEmensagensHttpSoap11Endpoint/";
        self::$operation = __FUNCTION__;

        self::$mountMessage = self::composeMessage(self::$operation);

        return self::$connection;
    }

    private static function mountMensage(SimpleXMLElement $dataMsg): void
    {
        //<![CDATA[[DadosMsg]]]>
        self::$mountMessage = parent::assembleMessage(self::$operation);

        $dadosMsg = self::$mountMessage->xpath('tin:Arg')[0];
        $dom = dom_import_simplexml($dadosMsg);
        $fragment = dom_import_simplexml($dataMsg);
        $dom->appendChild($dom->ownerDocument->importNode($fragment, true));

    }


}
