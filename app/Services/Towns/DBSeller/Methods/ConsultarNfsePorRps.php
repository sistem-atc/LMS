<?php

namespace App\Services\Towns\DBSeller\Methods;

use Illuminate\Support\Facades\Validator;

trait ConsultarNfsePorRps
{

    private static string $operation;

    public static function ConsultarNfsePorRps($data): string|int|array
    {

        $validator = Validator::make($data, [
            'Numero' => 'required',
            'Serie' => 'required',
            'Tipo' => 'required',
            'Cnpj' => 'required',
            'InscricaoMunicipal' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        };

        self::$operation = __FUNCTION__;
        $dataMsg = self::composeMessage(self::$operation);

        $dataMsg->Numero = $data['Numero'];
        $dataMsg->Serie = $data['Serie'];
        $dataMsg->Tipo = $data['Tipo'];
        $dataMsg->Cnpj = $data['Cnpj'];
        $dataMsg->InscricaoMunicipal = $data['InscricaoMunicipal'];
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg);

        return self::connection();
    }

}
