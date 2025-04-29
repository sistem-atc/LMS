<?php

namespace App\Services\Towns\DBSeller\Methods;

use Illuminate\Validation\Rule;
use App\Enums\MotivosCancelamento;
use Illuminate\Support\Facades\Validator;

trait CancelarNfse
{

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

        $dataMsg->Numero = $data['Numero'];
        $dataMsg->Cnpj = $data['Cnpj'];
        $dataMsg->InscricaoMunicipal = $data['InscricaoMunicipal'];
        $dataMsg->CodigoMunicipio = $data['CodigoMunicipio'];
        $dataMsg->CodigoCancelamento = MotivosCancelamento::from($data['motivoCancelamento'])->getLabel();

        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg);

        return self::connection();
    }

}
