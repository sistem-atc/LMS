<?php

namespace App\Services\Towns\Desenvolve\Methods;

use Illuminate\Support\Facades\Validator;

trait ConsultarNfseRpsEnvio
{

    private static string $operation;

    public static function consultarNfseRpsEnvio($data): string|int
    {

        $validator = Validator::make($data, [
            //Incluir as validações
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        };

        self::$operation = __FUNCTION__;
        $dataMsg = self::composeMessage(self::$operation);

        $dataMsg->Protocolo = $data['protocolo'];
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg);

        return self::connection();
    }

}
