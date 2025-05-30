<?php

namespace App\Services\Towns\Systems\Etransparencia;

use Exception;
use SimpleXMLElement;
use App\Enums\HttpMethod;
use Illuminate\Http\Client\PendingRequest;
use App\Services\Towns\Template\TownTemplate;

class Etransparencia extends TownTemplate
{

    private static $Codigo_Usuario = 'a5a07214-136a-4254-bad1-0272dc48238018ah24ni0119grav000-ed10--5l';
    private static $Codigo_Contribuinte = '1d658984-9ea7-4cbb-8769-e50f53fdd1f250ah10ni0091grav104-ed28--1l';

    use Methods\CANCELARNOTAELETRONICA,
        Methods\CONSNFSERECEBIDAS,
        Methods\CONSULTANOTASPROTOCOLO,
        Methods\CONSULTAPROTOCOLO,
        Methods\IMPRESSAOLINKNFSE,
        Methods\PROCESSARPS,
        Methods\VERFICARPS;

    protected static $verb = HttpMethod::POST;
    private static SimpleXMLElement $mountMessage;
    protected PendingRequest $pendingRequest;

    public static function getHeaders(): array
    {
        return [];
    }

    public function gerarNota($data): string|int|array
    {
        return self::PROCESSARPS($data);
    }

    public function consultarNota($data): string|int|array
    {
        return self::CONSULTANOTASPROTOCOLO($data);
    }

    public function cancelarNota($data): string|int|array
    {
        return self::CANCELARNOTAELETRONICA($data);
    }

    public function substituirNota(array $data): string|int|array
    {
        return throw new Exception('Método não implementado', 501);
    }

    public function __construct(array $configLoader)
    {
        parent::__construct($configLoader);
        $this->pendingRequest = $this->configureHttp();
    }

    protected function configureHttp(): PendingRequest
    {
        return $this->makeHttpClient()
            ->setHeaders($this->getHeaders())
            ->setBaseUrl(parent::$url)
            ->setChannel('towns')
            ->make();
    }

    private static function connection(): string|int|array|null
    {
        return self::Conection(
            null,
            parent::$url,
            self::$mountMessage->asXML(),
            self::getHeaders(),
            self::$verb
        );
    }

    private static function mountMensage(SimpleXMLElement $dataMsg): void
    {

    }

}
