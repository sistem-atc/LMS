<?php

namespace App\Services\Towns\WebIss\Methods;

use SimpleXMLElement;
use Illuminate\Support\Facades\Validator;

trait ConsultarSituacaoLoteRPS
{
    private static string $operation;
    private static string $endpoint;
    private static SimpleXMLElement $mountMessage;

    public static function ConsultarSituacaoLoteRPS(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'Cnpj' => 'required|digits:14|regex:/^\d{14}$/',
            'InscricaoMunicipal' => 'required|string|max:20',
            'Protocolo' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        self::$operation = __FUNCTION__;
        $dataMsg = self::composeMessage(self::$operation);
        self::mountMensage($dataMsg);

        return self::connection();

    }

}
