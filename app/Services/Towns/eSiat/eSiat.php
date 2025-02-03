<?php

namespace App\Services\Towns\eSiat;

use Exception;
use SimpleXMLElement;
use App\Enums\HttpMethod;
use App\Services\Utils\Towns\Bases\LinkTownBase;

class eSiat extends LinkTownBase
{

    use Methods\ConsultarTomador,
        Methods\RecepcionarApuracaoMensalDESIF,
        Methods\RecepcionarConsultaNotaCancelada,
        Methods\RecepcionarConsultaRPS,
        Methods\RecepcionarDeclaracaoAdministradoraCartao,
        Methods\RecepcionarLoteNotasCanceladas,
        Methods\RecepcionarLoteRps,
        Methods\RecepcionarNFSe,
        Methods\VerificarExistenciaNota,
        Methods\VersaoInstalada;

    protected static $verb = HttpMethod::POST;
    private static SimpleXMLElement $mountMessage;

    public static function getHeaders(): array
    {
        return [
            'Content-Type' => 'application/soap+xml;charset=UTF-8'
        ];
    }

    public function gerarNota(array $data): string|int|array
    {
        return self::RecepcionarNFSe($data);
    }

    public function consultarNota(array $data): string|int|array
    {
        return self::RecepcionarConsultaRPS($data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return self::RecepcionarLoteNotasCanceladas($data);
    }

    public function substituirNota(array $data): string|int|array
    {
        return throw new Exception('Método não implementado', 501);
    }

    public function __construct(array $configLoader)
    {
        parent::__construct($configLoader);
    }

    private static function connection(): string|int|array|null
    {
        return self::Conection(parent::$url, self::$mountMessage->asXML(), self::getHeaders(), self::$verb, false);
    }

    private static function mountMensage(SimpleXMLElement $dataMsg): void
    {

        //<![CDATA[[DadosMsg]]]>
        self::$mountMessage = self::assembleMessage();

        self::$mountMessage->registerXPathNamespace('soapenv', 'http://schemas.xmlsoap.org/soap/envelope/');

        $dadosMsg = self::$mountMessage->xpath('//e:Nfsedadosmsg')[0];
        $dom = dom_import_simplexml($dadosMsg);
        $fragment = dom_import_simplexml($dataMsg);
        $dom->appendChild($dom->ownerDocument->createCDATASection($dom->ownerDocument->saveXML($fragment)));

    }

}
