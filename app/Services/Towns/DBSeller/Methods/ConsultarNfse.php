<?php

namespace App\Services\Towns\DBSeller\Methods;

use Illuminate\Support\Facades\Validator;

trait ConsultarNfse
{

    private static string $operation;

    public static function ConsultarNfse($data): string|int|array
    {

        $validator = Validator::make($data, [
            'Cnpj' => 'required',
            'InscricaoMunicipal' => 'required',
            'DataInicial' => 'required|date',
            'DataFinal' => 'required|date',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        };

        self::$operation = __FUNCTION__;
        $dataMsg = self::composeMessage(self::$operation);

        $dataMsg->Cnpj = $data['Cnpj'];
        $dataMsg->InscricaoMunicipal = $data['InscricaoMunicipal'];
        $dataMsg->DataInicial = $data['DataInicial'];
        $dataMsg->DataFinal = $data['DataFinal'];
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg);

        return self::connection();
    }

}
