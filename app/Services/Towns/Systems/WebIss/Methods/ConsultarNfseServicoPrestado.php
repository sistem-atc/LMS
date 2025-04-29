<?php

namespace App\Services\Towns\WebIss\Methods;

use SimpleXMLElement;
use Illuminate\Support\Facades\Validator;

trait ConsultarNfseServicoPrestado
{

    private static string $operation;
    private static string $endpoint;
    private static SimpleXMLElement $mountMessage;

    public static function ConsultarNfseServicoPrestado(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'Cnpj' => 'required|digits:14|regex:/^\d{14}$/',
            'InscricaoMunicipal' => 'required|string|max:20',
            'DataInicial' => 'required|date|date_format:Y-m-d',
            'DataFinal' => 'required|date|date_format:Y-m-d',
            'Pagina' => 'nullable|integer',
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
