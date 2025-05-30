<?php

namespace App\Services\Towns\Systems\WebIss\Methods;

use SimpleXMLElement;
use Illuminate\Support\Facades\Validator;

trait CancelarNfse
{
    private static string $operation;
    private static string $endpoint;
    private static SimpleXMLElement $mountMessage;

    public static function CancelarNfse(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'Numero' => 'required|string',
            'Cnpj' => 'required|digits:14|regex:/^\d{14}$/',
            'InscricaoMunicipal' => 'required|string|max:20',
            'CodigoMunicipio' => 'required|digits:4',
            'CodigoCancelamento' => 'required|integer',
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
