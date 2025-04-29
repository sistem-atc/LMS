<?php

namespace App\Services\Towns\Systems\Abaco\Methods;

use Illuminate\Validation\Rule;
use App\Enums\TypeDocumentTransportEnum;
use Illuminate\Support\Facades\Validator;

trait ConsultarNfsePorRps
{

    private static string $endPoint;
    private static string $operation;
    public static function ConsultarNfsePorRps(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required|max:14',
            'inscricaoMunicipal' => 'required',
            'numero_RPS' => 'required',
            'serie_RPS' => 'required',
            'tipo_RPS' => [
                'required',
                Rule::in(TypeDocumentTransportEnum::cases())
            ],
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }
        ;

        self::$endPoint = 'aconsultarnfseporrps?wsdl';
        self::$operation = __FUNCTION__;
        $dataMsg = self::composeMessage(self::$operation);

        $dataMsg->Numero = $data['numero_RPS'];
        $dataMsg->Serie = $data['serie_RPS'];
        $dataMsg->Tipo = $data['tipo_RPS'];
        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];

        self::mountMensage($dataMsg, self::$operation, self::getVersion());

        return self::parseXmlToArray(self::connection(), '//ns:Outputxml');
    }

}
