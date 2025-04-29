<?php

namespace App\Services\Towns\SystemPro\Methods;

use SimpleXMLElement;
use Illuminate\Validation\Rule;
use App\Enums\MotivosCancelamento;
use Illuminate\Support\Facades\Validator;

trait CancelarNfse
{

    private static SimpleXMLElement $headMsg;
    private static string $operation;

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

        self::$operation = __FUNCTION__;
        $dataMsg = self::composeMessage(self::$operation);
        $codigoCancelamento = 'MC0' . MotivosCancelamento::from($data['motivoCancelamento'])->getLabel();

        $dataMsg->Numero = $data['numeroNF'];
        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->CodigoMunicipio = $data['codigoMunicipio'];
        $dataMsg->CodigoCancelamento = $codigoCancelamento;

        self::mountMensage(self::$headMsg, $dataMsg);

        return self::connection();
    }

}
