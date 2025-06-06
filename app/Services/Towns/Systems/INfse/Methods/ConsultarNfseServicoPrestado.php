<?php

namespace App\Services\Towns\Systems\INfse\Methods;

use Illuminate\Support\Facades\Validator;

trait ConsultarNfseServicoPrestado
{

    private static string $operation;

    public static function ConsultarNfseServicoPrestado(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
            'inscricaoMunicipal' => 'required',
            'dataInicial' => 'required',
            'dataFinal' => 'required',
            'numeroPagina' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        self::$operation = __FUNCTION__;
        $dataMsg = parent::composeMessage(self::$operation);
        self::mountMensage($dataMsg);

        $dataMsg = self::Sign_XML($dataMsg->asXML());

        return self::connection();
    }

}
