<?php

namespace App\Services\Towns\Betha;

use SimpleXMLElement;
use App\Enums\TypeRPS;
use Illuminate\Validation\Rule;
use App\Enums\MotivosCancelamento;
use Illuminate\Support\Facades\Validator;
use App\Services\Utils\Towns\Bases\LinkTownBase;
use App\Services\Utils\Towns\Helpers\LinksTowns;

class Betha extends LinkTownBase
{

    protected static $verb = 'POST';
    private static SimpleXMLElement $headMsg;

    protected static $headers = [];

    public function __construct(LinksTowns $linksTowns, $codeIbge)
    {
        parent::__construct($linksTowns, $codeIbge);
        self::$headMsg = self::composeHeader(parent::getHeaderVersion());
    }

    public static function CancelarNfse($data): string|int|array
    {

        $validator = Validator::make($data, [
            'Numero' => 'required',
            'Cnpj' => 'required',
            'InscricaoMunicipal' => 'required',
            'CodigoMunicipio' => 'required',
            'CodigoCancelamento' => [
                'required',
                Rule::in(MotivosCancelamento::cases())
            ],
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        };

        $operacao = 'CancelarNfse';
        $dataMsg = self::composeMessage($operacao);
        $codigoCancelamento = 'MC0' . MotivosCancelamento::from($data['motivoCancelamento']);

        $dataMsg->Numero = $data['numeroNF'];
        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->CodigoMunicipio = $data['codigoMunicipio'];
        $dataMsg->CodigoCancelamento = $codigoCancelamento;

        $mountMessage = self::mountMensage($operacao, self::$headMsg, $dataMsg);

        return parent::Conection(parent::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function ConsultarLoteRps($data): string|int|array
    {

        $validator = Validator::make($data, [
            'Cnpj' => 'required',
            'InscricaoMunicipal' => 'required',
            'Protocolo' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        };

        $operacao = 'ConsultarLoteRps';
        $dataMsg = self::composeMessage($operacao);
        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->Protocolo = $data['protocolo'];

        $mountMessage = self::mountMensage($operacao, self::$headMsg, $dataMsg);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function ConsultarNfseFaixa($data): string|int|array
    {

        $validator = Validator::make($data, [
            'Cnpj' => 'required',
            'InscricaoMunicipal' => 'required',
            'NumeroNfseInicial' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        };

        $operacao = 'ConsultarNfseFaixa';
        $dataMsg = self::composeMessage($operacao);

        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->NumeroNfseInicial = $data['numeroNfInicial'];
        $dataMsg->Pagina = $data['pagina'] ?? 1;

        $mountMessage = self::mountMensage($operacao, self::$headMsg, $dataMsg);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function ConsultarNfsePorRps($data): string|int|array
    {

        $validator = Validator::make($data, [
            'numeroRPS' => 'required',
            'Serie' => 'required',
            'Tipo' => [
                'required',
                Rule::in(TypeRPS::cases()),
            ],
            'Cnpj' => 'required',
            'InscricaoMunicipal' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        };

        $operacao = 'ConsultarNfsePorRps';
        $dataMsg = self::composeMessage($operacao);

        $dataMsg->Numero = $data['numeroRPS'];
        $dataMsg->Serie = $data['serie'];
        $dataMsg->Tipo = $data['tipo'];
        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->Protocolo = $data['protocolo'];

        $mountMessage = self::mountMensage($operacao, self::$headMsg, $dataMsg);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function ConsultarNfseServicoPrestado($data): string|int|array
    {

        $validator = Validator::make($data, [
            'Cnpj' => 'required',
            'InscricaoMunicipal' => 'required',
            'DataInicial' => 'required|date',
            'DataFinal' => 'required|date',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        };

        $operacao = 'ConsultarNfseServicoPrestado';
        $dataMsg = self::composeMessage($operacao);

        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->DataInicial = $data['dataInicial'];
        $dataMsg->DataFinal = $data['dataFinal'];
        $dataMsg->Pagina = $data['pagina'] ?? 1;

        $mountMessage = self::mountMensage($operacao, self::$headMsg, $dataMsg);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function ConsultarNfseServicoTomado($data): string|int|array
    {

        $validator = Validator::make($data, [
            'Cnpj' => 'required',
            'consulenteCnpj' => 'required',
            'tomadorCnpj' => 'required',
            'intermediarioCnpj' => 'required',
            'InscricaoMunicipal' => 'required',
            'consulenteInscricaoMunicipal' => 'required',
            'tomadorInscricaoMunicipal' => 'required',
            'intermediarioInscricaoMunicipal' => 'required',
            'DataInicial' => 'required',
            'DataFinal' => 'required',
            'CompetenciaInicial' => 'required',
            'CompetenciaFinal' => 'required',
            'DataFinal' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        };

        $operacao = 'ConsultarNfseServicoTomado';
        $dataMsg = self::composeMessage($operacao);

        /* Incluir as demais tags */
        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->Protocolo = $data['pagina'] ?? 1;

        $mountMessage = self::mountMensage($operacao, self::$headMsg, $dataMsg);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function GerarNfse($data): string|int|array
    {

        $validator = Validator::make($data, [
            'Numero' => 'required',
            'Cnpj' => 'required',
            'InscricaoMunicipal' => 'required',
            'CodigoMunicipio' => 'required',
            'CodigoCancelamento' => [
                'required',
                Rule::in(MotivosCancelamento::cases())
            ],
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        };

        $operacao = 'GerarNfse';
        $dataMsg = self::composeMessage($operacao);

        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->Protocolo = $data['protocolo'];

        $mountMessage = self::mountMensage($operacao, self::$headMsg, $dataMsg);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function RecepcionarLoteRps($data): string|int|array
    {

        $validator = Validator::make($data, [
            'Numero' => 'required',
            'Cnpj' => 'required',
            'InscricaoMunicipal' => 'required',
            'CodigoMunicipio' => 'required',
            'CodigoCancelamento' => [
                'required',
                Rule::in(MotivosCancelamento::cases())
            ],
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        };

        $operacao = 'RecepcionarLoteRps';
        $dataMsg = self::composeMessage($operacao);

        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->Protocolo = $data['protocolo'];

        $mountMessage = self::mountMensage($operacao, self::$headMsg, $dataMsg);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function RecepcionarLoteRpsSincrono($data): string|int|array
    {

        $validator = Validator::make($data, [
            'Numero' => 'required',
            'Cnpj' => 'required',
            'InscricaoMunicipal' => 'required',
            'CodigoMunicipio' => 'required',
            'CodigoCancelamento' => [
                'required',
                Rule::in(MotivosCancelamento::cases())
            ],
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        };

        $operacao = 'RecepcionarLoteRpsSincrono';
        $dataMsg = self::composeMessage($operacao);

        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->Protocolo = $data['protocolo'];

        $mountMessage = self::mountMensage($operacao, self::$headMsg, $dataMsg);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function SubstituirNfse($data): string|int|array
    {

        $validator = Validator::make($data, [
            'Numero' => 'required',
            'Cnpj' => 'required',
            'InscricaoMunicipal' => 'required',
            'CodigoMunicipio' => 'required',
            'CodigoCancelamento' => [
                'required',
                Rule::in(MotivosCancelamento::cases())
            ],
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        };

        $operacao = 'SubstituirNfse';
        $dataMsg = self::composeMessage($operacao);

        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->Protocolo = $data['protocolo'];

        $mountMessage = self::mountMensage($operacao, self::$headMsg, $dataMsg);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    private static function assembleMessage(): SimpleXMLElement
    {

        $content = file_get_contents(__DIR__ . 'schemas/AssembleMensage.xml');
        return new SimpleXMLElement($content);
    }

    private static function mountMensage(string $operation, SimpleXMLElement $headMsg, SimpleXMLElement $dataMsg): SimpleXMLElement
    {

        $mountMessage = self::assembleMessage();

        $mountMessage->xpath('//e:[Mount_Mensage].Execute')[0]->getName('//e:' . $operation . '.Execute');

        $nfseCabecMsg = $mountMessage->xpath('//nfseCabecMsg')[0];
        $xmlContentCabec = $headMsg->asXML();

        $domCabec = dom_import_simplexml($nfseCabecMsg);
        $cdataCabec = $domCabec->ownerDocument->createCDATASection($xmlContentCabec);
        $domCabec->appendChild($cdataCabec);

        $nfseDadosMsg = $mountMessage->xpath('//nfseDadosMsg')[0];
        $xmlContentDados = $dataMsg->asXML();

        $domDados = dom_import_simplexml($nfseDadosMsg);
        $cdataDados = $domDados->ownerDocument->createCDATASection($xmlContentDados);
        $domDados->appendChild($cdataDados);

        return $mountMessage;
    }

    private static function composeMessage(string $Tipo): SimpleXMLElement
    {

        switch ($Tipo) {

            case 'CancelarNfse':
                $content = file_get_contents(__DIR__ . 'schemas/CancelarNfse.xml');

            case 'ConsultarLoteRps':
                $content = file_get_contents(__DIR__ . 'schemas/ConsultarLoteRps.xml');

            case 'ConsultarNfseFaixa':
                $content = file_get_contents(__DIR__ . 'schemas/ConsultarNfseFaixa.xml');

            case 'ConsultarNfsePorRps':
                $content = file_get_contents(__DIR__ . 'schemas/ConsultarNfsePorRps.xml');

            case 'ConsultarNfseServicoPrestado':
                $content = file_get_contents(__DIR__ . 'schemas/ConsultarNfseServicoPrestado.xml');

            case 'ConsultarNfseServicoTomado':
                $content = file_get_contents(__DIR__ . 'schemas/ConsultarNfseServicoTomado.xml');

            case 'GerarNfse':
                $content = file_get_contents(__DIR__ . 'schemas/GerarNfse.xml');

            case 'RecepcionarLoteRps':
                $content = file_get_contents(__DIR__ . 'schemas/RecepcionarLoteRps.xml');

            case 'RecepcionarLoteRpsSincrono':
                $content = file_get_contents(__DIR__ . 'schemas/RecepcionarLoteRpsSincrono.xml');

            case 'SubstituirNfse':
                $content = file_get_contents(__DIR__ . 'schemas/SubstituirNfse.xml');
        }

        return new SimpleXMLElement($content);
    }

    private static function composeHeader(string $type): ?string
    {

        switch ($type) {

            case '2.02':
                $content = file_get_contents(__DIR__ . 'schemas/ComposeHeader.xml');
                return new SimpleXMLElement($content);
        }
    }
}
