<?php

namespace App\Services\Towns\SigIss_2;

use App\Enums\HttpMethod;
use Carbon\Carbon;
use SimpleXMLElement;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Enums\MotivosCancelamento;
use Illuminate\Support\Facades\Validator;
use App\Services\Utils\Towns\Bases\LinkTownBase;
use App\Services\Utils\Towns\Interfaces\LinkTownsInterface;

class SigIss_2 extends LinkTownBase implements LinkTownsInterface
{

    protected static $verb = HttpMethod::POST;
    protected static $operation;

    protected static $headers = [];

    public function consultarNota(array $data): string|int|array
    {
        return self::ConsultarNotaPrestador($data);
    }

    public function CancelarNota(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'Numero' => 'required',
            'Cnpj' => 'required',
            'Password' => 'required',
            'InscricaoMunicipal' => 'required',
            'CodigoCancelamento' => [
                'required',
                Rule::in(MotivosCancelamento::cases())
            ],
            'Email' => 'required'
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        };

        self::$operation = 'CancelarNota';
        $dataMsg = parent::composeMessage(self::$operation);
        $codigoCancelamento = 'MC0' . MotivosCancelamento::from($data['motivoCancelamento'])->getLabel();

        $dataMsg->nota = $data['Numero'];
        $dataMsg->cnpj = $data['Cnpj'];
        $dataMsg->ccm = $data['InscricaoMunicipal'];
        $dataMsg->senha = $data['Password'];
        $dataMsg->email = $data['Email'];
        $dataMsg->motivo = $codigoCancelamento;

        $mountMessage = self::mountMensage($dataMsg);

        return parent::Conection(parent::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function ConsultarNotaPrestador(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'Numero' => 'required',
            'Cnpj' => 'required',
            'Password' => 'required',
            'InscricaoMunicipal' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        };

        self::$operation = 'ConsultarNotaPrestador';
        $dataMsg = parent::composeMessage(self::$operation);

        $dataMsg->nota = $data['Numero'];
        $dataMsg->cnpj = $data['Cnpj'];
        $dataMsg->ccm = $data['InscricaoMunicipal'];
        $dataMsg->senha = $data['Password'];

        $mountMessage = self::mountMensage($dataMsg);

        return parent::Conection(parent::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function ConsultarNotaValida(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'Numero' => 'required',
            'Serie' => 'required',
            'Valor' => 'required',
            'Cnpj' => 'required',
            'InscricaoMunicipal' => 'required',
            'Autenticidade' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        };

        self::$operation = 'ConsultarNotaValida';
        $dataMsg = parent::composeMessage(self::$operation);

        $dataMsg->nota = $data['Numero'];
        $dataMsg->serie = $data['Serie'];
        $dataMsg->valor = $data['Valor'];
        $dataMsg->prestador_cnpj = $data['Cnpj'];
        $dataMsg->prestador_ccm = $data['InscricaoMunicipal'];
        $dataMsg->autenticidade = $data['Autenticidade'];

        $mountMessage = self::mountMensage($dataMsg);

        return parent::Conection(parent::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public function GerarNota(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'Cnpj' => 'required',
            'InscricaoMunicipal' => 'required',
            'Password' => 'required',
            'crc' => 'required',
            'crc_estado' => 'required',
            'aliquota_simples' => 'required',
            'id_sis_legado'  => 'required',
            'servico'  => 'required',
            'situacao' => 'required',
            'valor' => 'required',
            'base' => 'required',
            'descricaoNF' => 'required',
            'tomador_tipo' => 'required',
            'tomador_cnpj' => 'required',
            'tomador_email' => 'required',
            'tomador_ie' => 'required',
            'tomador_im' => 'required',
            'tomador_razao' => 'required',
            'tomador_fantasia' => 'required',
            'tomador_endereco' => 'required',
            'tomador_numero' => 'required',
            'tomador_complemento' => 'required',
            'tomador_bairro' => 'required',
            'tomador_CEP' => 'required',
            'tomador_cod_cidade' => 'required',
            'tomador_fone' => 'required',
            'tomador_ramal' => 'required',
            'tomador_fax' => 'required',
            'rps_num' => 'required',
            'rps_serie' => 'required',
            'rps_dia' => 'required',
            'rps_mes' => 'required',
            'rps_ano' => 'required',
            'outro_municipio' => 'required',
            'cod_outro_municipio' => 'required',
            'retencao_iss' => 'required',
            'pis' => 'required',
            'cofins' => 'required',
            'inss' => 'required',
            'irrf' => 'required',
            'csll' => 'required',
            'dia_emissao' => 'required',
            'mes_emissao' => 'required',
            'ano_emissao' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        };

        self::$operation = 'GerarNota';
        $dataMsg = parent::composeMessage(self::$operation);

        $dataMsg->ccm = $data['InscricaoMunicipal'];
        $dataMsg->cnpj = $data['Cnpj'];
        $dataMsg->senha = $data['Password'];
        $dataMsg->crc = $data['crc'];
        $dataMsg->crc_estado = $data['crc_estado'];
        $dataMsg->aliquota_simples = $data['aliquota_simples'];
        $dataMsg->id_sis_legado = $data['id_sis_legado'];
        $dataMsg->servico = $data['servico'];
        $dataMsg->situacao = $data['situacao'];
        $dataMsg->valor = $data['valor'];
        $dataMsg->base = $data['base'];
        $dataMsg->descricaoNF = $data['descricaoNF'];
        $dataMsg->tomador_tipo = $data['tomador_tipo'];
        $dataMsg->tomador_cnpj = $data['tomador_cnpj'];
        $dataMsg->tomador_email = $data['tomador_email'];
        $dataMsg->tomador_ie = $data['tomador_ie'];
        $dataMsg->tomador_im = $data['tomador_im'];
        $dataMsg->tomador_razao = $data['tomador_razao'];
        $dataMsg->tomador_fantasia = $data['tomador_fantasia'];
        $dataMsg->tomador_endereco = $data['tomador_endereco'];
        $dataMsg->tomador_numero = $data['tomador_numero'];
        $dataMsg->tomador_complemento = $data['tomador_complemento'];
        $dataMsg->tomador_bairro = $data['tomador_bairro'];
        $dataMsg->tomador_CEP = $data['tomador_CEP'];
        $dataMsg->tomador_cod_cidade = $data['tomador_cod_cidade'];
        $dataMsg->tomador_fone = $data['tomador_fone'];
        $dataMsg->tomador_ramal = $data['tomador_ramal'];
        $dataMsg->tomador_fax = $data['tomador_fax'];
        $dataMsg->rps_num = $data['rps_num'];
        $dataMsg->rps_serie = $data['rps_serie'];
        $dataMsg->rps_dia = $data['rps_dia'];
        $dataMsg->rps_mes = $data['rps_mes'];
        $dataMsg->rps_ano = $data['rps_ano'];
        $dataMsg->outro_municipio = $data['outro_municipio'];
        $dataMsg->cod_outro_municipio = $data['cod_outro_municipio'];
        $dataMsg->retencao_iss = $data['retencao_iss'];
        $dataMsg->pis = $data['pis'];
        $dataMsg->cofins = $data['cofins'];
        $dataMsg->inss = $data['inss'];
        $dataMsg->irrf = $data['irrf'];
        $dataMsg->csll = $data['csll'];
        $dataMsg->dia_emissao = $data['dia_emissao'];
        $dataMsg->mes_emissao = $data['mes_emissao'];
        $dataMsg->ano_emissao = $data['ano_emissao'];

        $mountMessage = self::mountMensage($dataMsg);

        return parent::Conection(parent::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function gerateste(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'dado' => 'required'
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        };

        self::$operation = 'gerateste';
        $dataMsg = parent::composeMessage(self::$operation);

        $dataMsg->dado = $data['dado'];

        $mountMessage = self::mountMensage($dataMsg);

        return parent::Conection(parent::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    private static function mountMensage(SimpleXMLElement $dataMsg): SimpleXMLElement
    {
        $mountMessage = parent::assembleMessage();
        $mountMessage = Str::replace('[DadosMsg]', self::$operation, $dataMsg);

        return new SimpleXMLElement($mountMessage);
    }

    private static function Tratar_Data(string $data): Carbon
    {

        /*StrData_Bruto = Replace(strData, "  ", " ")
        StrData_Bruto = Replace(StrData_Bruto, "12:00:00:000AM", "")
        StrData_Bruto = Replace(StrData_Bruto, "12:00:00:000PM", "")

        If InStr(1, StrData_Bruto, "Jan") > 0 Then
            StrData_Bruto = CDate(Replace(Replace(Trim(StrData_Bruto), " ", "/"), "Jan", "01"))
        ElseIf InStr(1, StrData_Bruto, "Feb") > 0 Then
            StrData_Bruto = CDate(Replace(Replace(Trim(StrData_Bruto), " ", "/"), "Feb", "02"))
        ElseIf InStr(1, StrData_Bruto, "Mar") > 0 Then
            StrData_Bruto = CDate(Replace(Replace(Trim(StrData_Bruto), " ", "/"), "Mar", "03"))
        ElseIf InStr(1, StrData_Bruto, "Apr") > 0 Then
            StrData_Bruto = CDate(Replace(Replace(Trim(StrData_Bruto), " ", "/"), "Apr", "04"))
        ElseIf InStr(1, StrData_Bruto, "May") > 0 Then
            StrData_Bruto = CDate(Replace(Replace(Trim(StrData_Bruto), " ", "/"), "May", "05"))
        ElseIf InStr(1, StrData_Bruto, "Jun") > 0 Then
            StrData_Bruto = CDate(Replace(Replace(Trim(StrData_Bruto), " ", "/"), "Jun", "06"))
        ElseIf InStr(1, StrData_Bruto, "Jul") > 0 Then
            StrData_Bruto = CDate(Replace(Replace(Trim(StrData_Bruto), " ", "/"), "Jul", "07"))
        ElseIf InStr(1, StrData_Bruto, "Aug") > 0 Then
            StrData_Bruto = CDate(Replace(Replace(Trim(StrData_Bruto), " ", "/"), "Aug", "08"))
        ElseIf InStr(1, StrData_Bruto, "Sep") > 0 Then
            StrData_Bruto = CDate(Replace(Replace(Trim(StrData_Bruto), " ", "/"), "Sep", "09"))
        ElseIf InStr(1, StrData_Bruto, "Oct") > 0 Then
            StrData_Bruto = CDate(Replace(Replace(Trim(StrData_Bruto), " ", "/"), "Oct", "10"))
        ElseIf InStr(1, StrData_Bruto, "Nov") > 0 Then
            StrData_Bruto = CDate(Replace(Replace(Trim(StrData_Bruto), " ", "/"), "Nov", "11"))
        ElseIf InStr(1, StrData_Bruto, "Dec") > 0 Then
            StrData_Bruto = CDate(Replace(Replace(Trim(StrData_Bruto), " ", "/"), "Dec", "12"))
        End If*/
        return Carbon::now();
    }
}
