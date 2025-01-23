<?php

namespace App\Services\Towns\iPM;

use SimpleXMLElement;
use App\Enums\HttpMethod;
use Illuminate\Support\Facades\Validator;
use App\Services\Utils\Towns\Bases\LinkTownBase;

class iPM extends LinkTownBase
{

    public static string $username;
    public static string $password;
    protected static $verb = HttpMethod::POST;
    private static SimpleXMLElement $mountMessage;
    private static string $boundary;

    public static function getHeaders(): array
    {
        return [
            'Content-Type' => 'multipart/form-data; boundary=' . self::$boundary,
            'Authorization' => 'Basic ' . base64_encode(self::$username . ':' . self::$password)
        ];
    }

    public function consultarNota(array $data): string|int|array
    {
        return self::Consulta_NotaFiscal($data);
    }

    public function gerarNota(array $data): string|int|array
    {
        return self::Emitir_NotaFiscal($data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return self::Cancelar_NotaFiscal($data);
    }

    public function __construct(array $configLoader)
    {
        parent::__construct($configLoader);
        self::getBoundary();
    }

    private static function connection(): string|int|array|null
    {
        return self::Conection(parent::$url, self::$mountMessage->asXML(), self::getHeaders(), self::$verb, false);
    }

    public static function Consulta_NotaFiscal(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'numero_nota' => 'required|string',
            'serie_nfse' => 'required|string',
            'cadastro' => 'required|string',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operation = __FUNCTION__;

        $dataMsg = parent::composeMessage($operation);
        $dataMsg->numero_nota = $data['numero_nota'];
        $dataMsg->serie_nfse = $data['serie_nfse'];
        $dataMsg->cadastro = $data['cadastro'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function Cancelar_NotaFiscal(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'numero_nota' => 'required|string',
            'serie_nfse' => 'required|string',
            'cadastro' => 'required|string',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operation = __FUNCTION__;

        $dataMsg = parent::composeMessage($operation);
        $dataMsg->numero_nota = $data['numero_nota'];
        $dataMsg->serie_nfse = $data['serie_nfse'];
        $dataMsg->cadastro = $data['cadastro'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function Emitir_NotaFiscal(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'numero_nota' => 'required|string',
            'serie_nfse' => 'required|string',
            'cadastro' => 'required|string',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operation = __FUNCTION__;

        $dataMsg = parent::composeMessage($operation);
        $dataMsg->numero_nota = $data['numero_nota'];
        $dataMsg->serie_nfse = $data['serie_nfse'];
        $dataMsg->cadastro = $data['cadastro'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

    private static function generateRandomString($length, $rString, $rInteger): string
    {
        $characterBank = [];
        $str = '';

        if ($rString) {
            $characterBank = array_merge(range('a', 'z'), range('A', 'Z'), range(0, 9));
        } elseif ($rInteger) {
            $characterBank = range(0, 9);
        }

        for ($i = 0; $i < $length; $i++) {
            $str .= $characterBank[array_rand($characterBank)];
        }

        return $str;
    }

    private static function mountMensage(SimpleXMLElement $dataMsg): void
    {

        $assemble = '--' . self::$boundary . '\n' .
                    'Content-Type: text/xml; charset=Cp1252; name=CAC.xml' . '\n' .
                    'Content-Transfer-Encoding: binary' . '\n' .
                    'Content-Disposition: form-data; name="CAC.xml"; filename="CAC.xml"' . '\n' .
                    '<?xml version="1.0" encoding="ISO-8859-1"?>' . '\n' .
                    $dataMsg->asXML() . '\n' .
                    '--' . self::$boundary . '--' . '\n';

        self::$mountMessage = $assemble;

    }

    private static function getBoundary(): void
    {
        self::$boundary = "----=_Part_" .
               self::generateRandomString(2, false, true) . "_" .
               self::generateRandomString(24, true, false);
    }

}
