<?php

namespace App\Services\Towns\Betha;

use SimpleXMLElement;
use App\Enums\TypeRPS;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Enums\MotivosCancelamento;
use Illuminate\Support\Facades\Validator;
use App\Services\Utils\Towns\Bases\LinkTownBase;
use App\Services\Utils\Towns\Interfaces\LinkTownsInterface;

class Betha extends LinkTownBase implements LinkTownsInterface
{

    protected static $verb = 'POST';
    private static SimpleXMLElement $headMsg;
    protected static $operation;

    protected static $headers = [];

    public function gerarNota(array $data): string|int|array
    {
        return self::GerarNfse($data);
    }

    public function consultarNota(array $data): string|int|array
    {
        return self::ConsultarNfsePorRps($data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return self::CancelarNfse($data);
    }

    public function __construct($codeIbge)
    {
        parent::__construct($codeIbge);
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
            return ['errors' => $validator->errors(), 'response' => 422];
        };

        self::$operation = 'CancelarNfse';
        $dataMsg = parent::composeMessage(self::$operation, __DIR__);
        $codigoCancelamento = 'MC0' . MotivosCancelamento::from($data['motivoCancelamento'])->getLabel();

        $dataMsg->Numero = $data['numeroNF'];
        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->CodigoMunicipio = $data['codigoMunicipio'];
        $dataMsg->CodigoCancelamento = $codigoCancelamento;

        $mountMessage = self::mountMensage(self::$headMsg, $dataMsg);

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
            return ['errors' => $validator->errors(), 'response' => 422];
        };

        self::$operation = 'ConsultarLoteRps';
        $dataMsg = parent::composeMessage(self::$operation, __DIR__);
        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->Protocolo = $data['protocolo'];

        $mountMessage = self::mountMensage(self::$headMsg, $dataMsg);

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
            return ['errors' => $validator->errors(), 'response' => 422];
        };

        self::$operation = 'ConsultarNfseFaixa';
        $dataMsg = parent::composeMessage(self::$operation, __DIR__);

        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->NumeroNfseInicial = $data['numeroNfInicial'];
        $dataMsg->Pagina = $data['pagina'] ?? 1;

        $mountMessage = self::mountMensage(self::$headMsg, $dataMsg);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function ConsultarNfsePorRps($data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required|max:14',
            'inscricaoMunicipal' => 'required',
            'numero_RPS' => 'required',
            'serie_RPS' => 'required',
            'tipo_RPS' => [
                'required',
                Rule::in(TypeRPS::cases())
            ],
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        };

        self::$operation = 'ConsultarNfsePorRps';
        $dataMsg = parent::composeMessage(self::$operation, __DIR__);

        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->Numero = $data['numero_RPS'];
        $dataMsg->Serie = $data['serie_RPS'];
        $dataMsg->Tipo = $data['tipo_RPS'];

        $mountMessage = self::mountMensage(self::$headMsg, $dataMsg);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function ConsultarNfseServicoPrestado($data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
            'inscricaoMunicipal' => 'required',
            'dataInicial' => 'required|date',
            'dataFinal' => 'required|date',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        };

        self::$operation = 'ConsultarNfseServicoPrestado';
        $dataMsg = parent::composeMessage(self::$operation, __DIR__);

        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->DataInicial = $data['dataInicial'];
        $dataMsg->DataFinal = $data['dataFinal'];
        $dataMsg->Pagina = $data['pagina'] ?? 1;

        $mountMessage = self::mountMensage(self::$headMsg, $dataMsg);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function ConsultarNfseServicoTomado($data): string|int|array
    {

        self::$operation = 'ConsultarNfseServicoTomado';
        $dataMsg = parent::composeMessage(self::$operation, __DIR__);

        if (!isset($data['cnpjTomador'])) {
            unset($dataMsg->Intermediario);
            $dataMsg->Tomador->CpfCnpj->Cnpj = $data['cnpjTomador'];
            $dataMsg->Consulente->CpfCnpj->Cnpj = $data['cnpjTomador'];
            $dataMsg->Tomador->InscricaoMunicipal = $data['incricaoMunicialTomador'];
            $dataMsg->Consulente->InscricaoMunicipal = $data['incricaoMunicialTomador'];
        } else {
            unset($dataMsg->Tomador);
            $dataMsg->Intermediario->CpfCnpj->Cnpj = $data['cnpjIntermediario'];
            $dataMsg->Consulente->CpfCnpj->Cnpj = $data['cnpjIntermediario'];
            $dataMsg->Intermediario->InscricaoMunicipal = $data['incricaoMunicialIntermediario'];
            $dataMsg->Consulente->InscricaoMunicipal = $data['incricaoMunicialIntermediario'];
        }

        if (!isset($data['periodoEmissaoDataInicial'])) {
            unset($dataMsg->PeriodoEmissao);
            $dataMsg->PeriodoCompetencia->DataInicial = $data['periodoCompetenciaDataInicial'];
            $dataMsg->PeriodoCompetencia->DataFinal = $data['periodoCompetenciaDataFinal'];
        } else {
            unset($dataMsg->PeriodoCompetencia);
            $dataMsg->PeriodoEmissao->DataInicial = $data['periodoEmissaoDataInicial'];
            $dataMsg->PeriodoEmissao->DataFinal = $data['periodoEmissaoDataFinal'];
        }

        if (!isset($data['numeroNF'])) {
            unset($dataMsg->NumeroNfse);
        } else {
            $dataMsg->NumeroNfse = $data['numeroNF'];
        }

        $dataMsg->Protocolo = $data['pagina'] ?? 1;

        $mountMessage = self::mountMensage(self::$headMsg, $dataMsg);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function GerarNfse($data): string|int|array
    {

        $validator = Validator::make($data, [
            'infoId' => ['required', 'string'],
            'numeroRps' => 'required',
            'serieRps' => 'required',
            'tipo_RPS' => ['required', Rule::in(TypeRPS::cases())],
            'dataEmissao' => ['required', 'date'],
            'status' => ['required', 'integer'],
            'competencia' => ['required', 'date'],
            'valorServicos' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'valorDeducoes' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'valorPis' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'valorCofins' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'valorInss' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'valorIr' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'valorCsll' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'valorOutraRetencoes' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'descontoIncodicionado' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'descontoCodicionado' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'issRetido' => ['required', 'integer'],
            'itemListaServico' => 'required',
            'codigoTributacao' => ['required'],
            'discriminacao' => ['required'],
            'codigoMunicipio' => ['required'],
            'exigibilidadeIss' => 'integer',
            'municipioIncidencia' => 'long',
            'prestador.cnpj' => ['required'],
            'prestador.inscricaoMunicipal' => ['required'],
            'tomador.cnpj' => ['required'],
            'tomador.razaoSocial' => ['required'],
            'tomador.endereco' => ['required'],
            'tomador.numero' => ['required'],
            'tomador.complemento' => ['required'],
            'tomador.bairro' => ['required'],
            'tomador.codigoMunicipio' => ['required'],
            'tomador.uf' => ['required'],
            'tomador.cep' => ['required'],
            'tomador.contato' => ['required'],
            'tomador.email' => ['required'],
            'regimeEspecialTributacao' => 'required',
            'optanteSimplesNacional' => 'required',
            'incentivoFiscal' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        };

        self::$operation = 'GerarNfse';
        $dataMsg = parent::composeMessage(self::$operation, __DIR__);

        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->Protocolo = $data['protocolo'];

        $mountMessage = self::mountMensage(self::$headMsg, $dataMsg);

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
            return ['errors' => $validator->errors(), 'response' => 422];
        };

        self::$operation = 'RecepcionarLoteRps';
        $dataMsg = parent::composeMessage(self::$operation, __DIR__);

        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->Protocolo = $data['protocolo'];

        $mountMessage = self::mountMensage(self::$headMsg, $dataMsg);

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
            return ['errors' => $validator->errors(), 'response' => 422];
        };

        self::$operation = 'RecepcionarLoteRpsSincrono';
        $dataMsg = parent::composeMessage(self::$operation, __DIR__);

        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->Protocolo = $data['protocolo'];

        $mountMessage = self::mountMensage(self::$headMsg, $dataMsg);

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
            return ['errors' => $validator->errors(), 'response' => 422];
        };

        self::$operation = 'SubstituirNfse';
        $dataMsg = parent::composeMessage(self::$operation, __DIR__);

        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->Protocolo = $data['protocolo'];

        $mountMessage = self::mountMensage(self::$headMsg, $dataMsg);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    private static function mountMensage(SimpleXMLElement $headMsg, SimpleXMLElement $dataMsg): SimpleXMLElement
    {

        $mountMessage = self::assembleMessage();

        $mountMessage->registerXPathNamespace('e', 'http://www.e-nfs.com.br');
        $mountMessage->registerXPathNamespace('soapenv', 'http://schemas.xmlsoap.org/soap/envelope/');

        $cabecMsg = $mountMessage->xpath('//e:Nfsecabecmsg')[0];
        $dom = dom_import_simplexml($cabecMsg);
        $fragment = dom_import_simplexml($headMsg);
        $dom->appendChild($dom->ownerDocument->createCDATASection($dom->ownerDocument->saveXML($fragment)));

        $dadosMsg = $mountMessage->xpath('//e:Nfsedadosmsg')[0];
        $dom = dom_import_simplexml($dadosMsg);
        $fragment = dom_import_simplexml($dataMsg);
        $dom->appendChild($dom->ownerDocument->createCDATASection($dom->ownerDocument->saveXML($fragment)));

        return $mountMessage;
    }

    private static function assembleMessage(): SimpleXMLElement
    {

        $content = file_get_contents(__DIR__ . 'schemas/AssembleMensage.xml');
        $content = Str::replace('[Mount_Mensage]', self::$operation, $content);

        return new SimpleXMLElement($content);
    }

    private static function composeHeader(string $type): SimpleXMLElement | null
    {

        switch ($type) {

            case '2.02':
                return new SimpleXMLElement(file_get_contents(__DIR__ . 'schemas/ComposeHeader.xml'));

            default:
                return null;
        }
    }
}
