<?php

namespace App\Services\Towns\Systems\Abaco\Methods;

use Illuminate\Support\Facades\Validator;

trait ConsultarLoteRps
{

    private static string $endPoint;
    private static string $operation;

    public static function ConsultarLoteRps(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required|max:14',
            'inscricaoMunicipal' => 'required',
            'protocolo' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }
        ;

        self::$endPoint = 'aconsultarloterps?wsdl';
        self::$operation = __FUNCTION__;
        $dataMsg = self::composeMessage(self::$operation);

        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->Protocolo = $data['protocolo'];

        self::mountMensage($dataMsg, self::$operation, self::getVersion());

        return self::parseXmlToArray(self::connection(), '//ns:Outputxml');
    }
}
