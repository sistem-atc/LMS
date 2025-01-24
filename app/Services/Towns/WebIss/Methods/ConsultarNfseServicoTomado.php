<?php

namespace App\Services\Towns\WebIss\Methods;

use SimpleXMLElement;
use Illuminate\Support\Facades\Validator;

trait ConsultarNfseServicoTomado
{
    private static string $operation;
    private static string $endpoint;
    private static SimpleXMLElement $mountMessage;

    public static function ConsultarNfseServicoTomado(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'Cnpj_Consulente' => 'required|digits:14|regex:/^\d{14}$/',
            'InscricaoMunicipal_Consulente' => 'required|string|max:20',
            'NumeroNfse' => 'required|string|max:50',
            'DataInicial_Emissao' => 'required|date|date_format:Y-m-d',
            'DataFinal_Emissao' => 'required|date|date_format:Y-m-d',
            'DataInicial_Competencia' => 'required|date|date_format:Y-m-d',
            'DataFinal_Competencia' => 'required|date|date_format:Y-m-d',
            'Cnpj_Prestador' => 'required|digits:14|regex:/^\d{14}$/',
            'InscricaoMunicipal_Prestador' => 'required|string|max:20',
            'Cnpj_Tomador' => 'required|digits:14|regex:/^\d{14}$/',
            'InscricaoMunicipal_Tomador' => 'required|string|max:20',
            'Cnpj_Intermediario' => 'required|digits:14|regex:/^\d{14}$/',
            'InscricaoMunicipal_Intermediario' => 'required|string|max:20',
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
