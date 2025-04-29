<?php

namespace App\Services\Towns\Betha\Methods;

use SimpleXMLElement;
use Illuminate\Validation\Rule;
use App\Enums\MotivosCancelamento;
use Illuminate\Support\Facades\Validator;

trait SubstituirNfse
{

    private static SimpleXMLElement $headMsg;
    private static string $operation;
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

        self::$operation = __FUNCTION__;
        $dataMsg = self::composeMessage(self::$operation);

        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->Protocolo = $data['protocolo'];

        self::mountMensage(self::$headMsg, $dataMsg);

        return self::connection();
    }

}
