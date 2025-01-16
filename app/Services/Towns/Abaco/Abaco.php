<?php

namespace App\Services\Towns\Abaco;

use App\Enums\HttpMethod;
use Carbon\Carbon;
use SimpleXMLElement;
use App\Enums\TypeRPS;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Services\Utils\Towns\Bases\LinkTownBase;
use App\Services\Utils\Towns\Interfaces\LinkTownsInterface;

class Abaco extends LinkTownBase implements LinkTownsInterface
{

    protected static $verb = HttpMethod::POST;
    private static SimpleXMLElement $headMsg;
    protected static string|int|array|null $connection;
    private static SimpleXMLElement $mountMessage;
    private static string $endPoint;
    protected static $headers;

    public static function getHeaders(): array
    {
        return [
            'Content-Type' => 'text/xml;charset=UTF-8'
        ];
    }

    public function gerarNota(array $data): string|int|array
    {
        return self::recepcionarLoteRps($data);
    }

    public function consultarNota(array $data): string|int|array
    {
        return self::ConsultarNfsePorRps($data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return 'Metodo cancelarNota inexistente para a prefeitura';
    }

    public function __construct($codeIbge)
    {
        parent::__construct($codeIbge);
        self::$headMsg = self::composeHeader();
        self::$connection = self::Conection(parent::$url . self::$endPoint, self::$mountMessage->asXML(), static::$headers, self::$verb, false);
    }

    public static function RecepcionarLoteRPS(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'idLote' => ['required', 'string'],
            'numeroLote' => ['required', 'integer'],
            'cnpj' => ['required'],
            'inscricaoMunicipal' => ['required'],
            'rps' => ['required', 'array'],
            'rps.*.infoId' => ['required', 'string'],
            'rps.*.numeroRps' => ['required', 'integer'],
            'rps.*.serieRps' => ['required', 'string'],
            'rps.*.tipoRps' => ['required', Rule::in(TypeRPS::cases())],
            'rps.*.dataEmissao' => ['required', 'date'],
            'rps.*.naturezaOperacao' => ['required', 'integer'],
            'rps.*.regimeTributacao' => ['required', 'integer'],
            'rps.*.optanteSimplesNacional' => ['required', 'integer'],
            'rps.*.incentivadorCultural' => ['required', 'integer'],
            'rps.*.status' => ['required', 'integer'],
            'rps.*.valorServicos' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'rps.*.valorDeducoes' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'rps.*.valorPis' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'rps.*.valorCofins' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'rps.*.valorInss' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'rps.*.valorIr' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'rps.*.valorCsll' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'rps.*.issRetido' => ['required', 'integer'],
            'rps.*.valorIss' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'rps.*.valorIssRetido' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'rps.*.valorOutraRetencoes' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'rps.*.baseCalculo' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'rps.*.aliquota' => ['required', 'numeric'],
            'rps.*.valorLiquidoNfse' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'rps.*.descontoIncodicionado' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'rps.*.descontoCodicionado' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'rps.*.itemListaServico' => ['required'],
            'rps.*.codigoCnae' => ['required'],
            'rps.*.codigoTributacao' => ['required'],
            'rps.*.discriminacao' => ['required'],
            'rps.*.prestador.cnpj' => ['required'],
            'rps.*.prestador.inscricaoMunicipal' => ['required'],
            'rps.*.tomador.cnpj' => ['required'],
            'rps.*.tomador.inscricaoMunicipal' => ['required'],
            'rps.*.tomador.razaoSocial' => ['required'],
            'rps.*.tomador.endereco' => ['required'],
            'rps.*.tomador.numero' => ['required'],
            'rps.*.tomador.complemento' => ['required'],
            'rps.*.tomador.bairro' => ['required'],
            'rps.*.tomador.codigoMunicipio' => ['required'],
            'rps.*.tomador.uf' => ['required'],
            'rps.*.tomador.cep' => ['required'],
            'rps.*.tomador.contato' => ['required'],
            'rps.*.tomador.email' => ['required'],
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        };

        self::$endPoint = 'arecepcionarloterps?wsdl';

        $loteRPS = 'LoteRPS';
        $mountRPS = self::composeMessage($loteRPS);
        $mountRPS->InfRps->attributes()->id = $data['rps'][0]['infoId'];
        $mountRPS->InfRps->IdentificacaoRps->Numero = $data['rps'][0]['numeroRps'];
        $mountRPS->InfRps->IdentificacaoRps->Serie = $data['rps'][0]['serieRps'];
        $mountRPS->InfRps->IdentificacaoRps->Tipo = $data['rps'][0]['tipoRps'];
        $mountRPS->DataEmissao = Carbon::parse($data['rps'][0]['dataEmissao'])->format('Y-m-d\TH:i:s');
        $mountRPS->NaturezaOperacao = $data['rps'][0]['naturezaOperacao'];
        $mountRPS->RegimeEspecialTributacao = $data['rps'][0]['regimeTributacao'];
        $mountRPS->OptanteSimplesNacional = $data['rps'][0]['optanteSimplesNacional'];
        $mountRPS->IncentivadorCultural = $data['rps'][0]['incentivadorCultural'];
        $mountRPS->Status = $data['rps'][0]['status'];
        $mountRPS->Servico->Valores->ValorServicos = $data['rps'][0]['valorServicos'];
        $mountRPS->Servico->Valores->ValorDeducoes = $data['rps'][0]['valorDeducoes'];
        $mountRPS->Servico->Valores->ValorPis = $data['rps'][0]['valorPis'];
        $mountRPS->Servico->Valores->ValorCofins = $data['rps'][0]['valorCofins'];
        $mountRPS->Servico->Valores->ValorInss = $data['rps'][0]['valorInss'];
        $mountRPS->Servico->Valores->ValorIr = $data['rps'][0]['valorIr'];
        $mountRPS->Servico->Valores->ValorCsll = $data['rps'][0]['valorCsll'];
        $mountRPS->Servico->Valores->IssRetido = $data['rps'][0]['issRetido'];
        $mountRPS->Servico->Valores->ValorIss = $data['rps'][0]['valorIss'];
        $mountRPS->Servico->Valores->ValorIssRetido = $data['rps'][0]['valorIssRetido'];
        $mountRPS->Servico->Valores->OutrasRetencoes = $data['rps'][0]['valorOutraRetencoes'];
        $mountRPS->Servico->Valores->BaseCalculo = $data['rps'][0]['baseCalculo'];
        $mountRPS->Servico->Valores->Aliquota = $data['rps'][0]['aliquota'];
        $mountRPS->Servico->Valores->ValorLiquidoNfse = $data['rps'][0]['valorLiquidoNfse'];
        $mountRPS->Servico->Valores->DescontoIncondicionado = $data['rps'][0]['descontoIncodicionado'];
        $mountRPS->Servico->Valores->DescontoCondicionado = $data['rps'][0]['descontoCodicionado'];
        $mountRPS->Servico->ItemListaServico = $data['rps'][0]['itemListaServico'];
        $mountRPS->Servico->CodigoCnae = $data['rps'][0]['codigoCnae'];
        $mountRPS->Servico->CodigoTributacaoMunicipio = $data['rps'][0]['codigoTributacao'];
        $mountRPS->Servico->Discriminacao = $data['rps'][0]['discriminacao'];
        $mountRPS->Servico->CodigoMunicipio = $data['rps'][0]['codigoMunicipio'];
        $mountRPS->Prestador->Cnpj = $data['rps'][0]['prestador']['cnpj'];
        $mountRPS->Prestador->InscricaoMunicipal = $data['rps'][0]['prestador']['inscricaoMunicipal'];
        $mountRPS->Tomador->IdentificacaoTomador->CpfCnpj->Cnpj = $data['rps'][0]['tomador']['cnpj'];
        $mountRPS->Tomador->IdentificacaoTomador->InscricaoMunicipal = $data['rps'][0]['tomador']['inscricaoMunicipal'];
        $mountRPS->Tomador->IdentificacaoTomador->RazaoSocial = $data['rps'][0]['tomador']['razaoSocial'];
        $mountRPS->Tomador->IdentificacaoTomador->Endereco->Endereco = $data['rps'][0]['tomador']['endereco'];
        $mountRPS->Tomador->IdentificacaoTomador->Endereco->Numero = $data['rps'][0]['tomador']['numero'];
        $mountRPS->Tomador->IdentificacaoTomador->Endereco->Complemento = $data['rps'][0]['tomador']['complemento'];
        $mountRPS->Tomador->IdentificacaoTomador->Endereco->Bairro = $data['rps'][0]['tomador']['bairro'];
        $mountRPS->Tomador->IdentificacaoTomador->Endereco->CodigoMunicipio = $data['rps'][0]['tomador']['codigoMunicipio'];
        $mountRPS->Tomador->IdentificacaoTomador->Endereco->Uf = $data['rps'][0]['tomador']['uf'];
        $mountRPS->Tomador->IdentificacaoTomador->Endereco->Cep = $data['rps'][0]['tomador']['cep'];
        $mountRPS->Tomador->IdentificacaoTomador->Contato->Contato = $data['rps'][0]['tomador']['contato'];
        $mountRPS->Tomador->IdentificacaoTomador->Contato->Email = $data['rps'][0]['tomador']['email'];

        $mountRPS = self::Sign_XML($mountRPS->asXML());

        $dataMsg = self::composeMessage(__FUNCTION__);
        $dataMsg->LoteRps['id'] = $data['idLote'];
        $dataMsg->LoteRps->NumeroLote = $data['numeroLote'];
        $dataMsg->LoteRps->Cnpj = $data['cnpj'];
        $dataMsg->LoteRps->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->LoteRps->QuantidadeRps = $data['qtdRps'];

        $listaRps = $dataMsg->LoteRps->ListaRps;
        $dom = dom_import_simplexml($listaRps);
        $fragment = dom_import_simplexml($mountRPS);
        $dom->appendChild($dom->ownerDocument->importNode($fragment, true));

        self::mountMensage($dataMsg);
        self::$mountMessage = self::Sign_XML(self::$mountMessage);

        return self::$connection;
    }

    public static function ConsultarSituacaoLoteRPS(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required|max:14',
            'inscricaoMunicipal' => 'required',
            'protocolo' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        };

        self::$endPoint = 'aconsultarsituacaoloterps?wsdl';
        $dataMsg = self::composeMessage(__FUNCTION__);

        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->Protocolo = $data['protocolo'];

        self::mountMensage($dataMsg);

        return self::$connection;
    }

    public static function ConsultarNfsePorRps(array $data): string|int|array
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

        self::$endPoint = 'aconsultarnfseporrps?wsdl';
        $dataMsg = self::composeMessage(__FUNCTION__);

        $dataMsg->Numero = $data['numero_RPS'];
        $dataMsg->Serie = $data['serie_RPS'];
        $dataMsg->Tipo = $data['tipo_RPS'];
        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];

        self::mountMensage($dataMsg);

        return self::$connection;
    }

    public static function ConsultarLoteRps(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required|max:14',
            'inscricaoMunicipal' => 'required',
            'protocolo' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        };

        self::$endPoint = 'aconsultarloterps?wsdl';
        $dataMsg = self::composeMessage(__FUNCTION__);

        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->Protocolo = $data['protocolo'];

        self::mountMensage($dataMsg);

        return self::$connection;
    }

    public static function ConsultarNfse(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required|max:14',
            'inscricaoMunicipal' => 'required',
            'dataInicial' => 'required|date',
            'dataFinal' => 'required|date',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        };

        self::$endPoint = 'aconsultarnfse?wsdl';
        $dataMsg = self::composeMessage(__FUNCTION__);

        if (!isset($data['tomador'])) {
            unset($dataMsg->Tomador);
        } else {
            $dataMsg->InscricaoMunicipal = $data['tomador.inscricaoMunicipal'];
            if (!isset($data['tomador.cnpj'])) {
                unset($dataMsg->xpath('//Tomador/CpfCnpj/Cpf')[0]);
                $dataMsg->Cnpj = $data['tomador.cnpj'];
            } else {
                unset($dataMsg->xpath('//Tomador/CpfCnpj/Cnpj')[0]);
                $dataMsg->Cpf = $data['tomador.Cpf'];
            }
        }

        if (!isset($data['intermediarioServico'])) {
            unset($xml->IntermediarioServico);
        } else {
            $dataMsg->InscricaoMunicipal = $data['intermediarioServico.inscricaoMunicipal'];
            if (!isset($data['intermediarioServico.cnpj'])) {
                unset($dataMsg->xpath('//IntermediarioServico/CpfCnpj/Cpf')[0]);
                $dataMsg->Cnpj = $data['intermediarioServico.cnpj'];
            } else {
                unset($dataMsg->xpath('//IntermediarioServico/CpfCnpj/Cnpj')[0]);
                $dataMsg->Cpf = $data['intermediarioServico.Cpf'];
            }
        }

        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->DataInicial = Carbon::parse($data['dataInicial'])->format('Y-m-d\TH:i:s');
        $dataMsg->DataFinal = Carbon::parse($data['dataFinal'])->format('Y-m-d\TH:i:s');

        self::mountMensage($dataMsg);

        return self::$connection;
    }

    private static function mountMensage(SimpleXMLElement $dataMsg): void
    {

        self::$mountMessage = parent::assembleMessage();

        self::$mountMessage->registerXPathNamespace('e', 'http://www.e-nfs.com.br');
        self::$mountMessage->registerXPathNamespace('soapenv', 'http://schemas.xmlsoap.org/soap/envelope/');

        $cabecMsg = self::$mountMessage->xpath('//e:Nfsecabecmsg')[0];
        $dom = dom_import_simplexml($cabecMsg);
        $fragment = dom_import_simplexml(self::$headMsg);
        $dom->appendChild($dom->ownerDocument->importNode($fragment, true));

        $dadosMsg = self::$mountMessage->xpath('//e:Nfsedadosmsg')[0];
        $dom = dom_import_simplexml($dadosMsg);
        $fragment = dom_import_simplexml($dataMsg);
        $dom->appendChild($dom->ownerDocument->importNode($fragment, true));

    }

}
