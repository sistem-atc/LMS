<?php

namespace App\Services\Towns\Iss_Londrina;

use Exception;
use SimpleXMLElement;
use App\Enums\HttpMethod;
use App\Bases\LinkTownBase;

class Iss_Londrina extends LinkTownBase
{

    use Methods\CancelarNota,
        Methods\ConsultarCadastroContribuinte,
        Methods\ConsultarNfseServicoPrestado,
        Methods\ConsultarRpsServicoPrestado,
        Methods\GerarNota;

    protected static $verb = HttpMethod::POST;
    private static SimpleXMLElement $mountMessage;

    public static function getHeaders(): array
    {
        return [
            'SOAPAction' => 'POST',
            'Content-Type' => 'text/xml;charset=UTF-8'
        ];
    }

    public function gerarNota(array $data): string|int|array
    {
        return self::GerarNota($data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return self::CancelarNota($data);
    }

    public function consultarNota(array $data): string|int|array
    {
        return self::ConsultarNfseServicoPrestado($data);
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

    }

}
