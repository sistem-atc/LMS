<?php

namespace App\Services\Utils\Towns\Helpers;

use Illuminate\Support\Facades\Http;

class Connection
{
    private static $instance;

    public static function getInstance()
    {

        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public static function Conexao(string $url, string $xmlMesage, ?array $headers, ?string $typeSend, bool $useCertificate): string|int
    {

        if (!is_null($headers)) {
            $options = $headers;
        }

        /*$Conected_VPN_ = self::Conected_VPN();
        if ($Conected_VPN_[0]) {
            $guzzleClient = new GuzzleClient([
                'proxy' => [
                    'http' => $Conected_VPN_[1],
                    'https' => $Conected_VPN_[1],
                    'request_fulluri' => true,
                    'auth' => [$Conected_VPN_[2], $Conected_VPN_[3]],
                ],
            ]);
            Http::withOptions([
                'handler' => $guzzleClient->getConfig('handler'),
            ]);
        }

        if ($Use_Certificate) {
            $options=[
                'local_cert' => env("Path_Certificado_" . $Used_Companny),
                'verify_peer' => false,
            ];
        }*/

        $response = Http::withHeaders([
            $options,
        ])->post($url, $xmlMesage);

        dd($response->body());

        return self::tratarCaracteres($response);
    }

    public static function tratarCaracteres(string $chars): string
    {

        $tratarCaracteres = $chars;

        $StrReplace = array(
            "&lt;|<",
            "&gt;|>",
            "&#xd;|",
            "á|a",
            "Á|A",
            "Â|A",
            "â|a",
            "À|A",
            "à|a",
            "Ã|A",
            "ã|a",
            "ä|a",
            "Ä|A",
            "É|E",
            "é|e",
            "Ê|E",
            "ê|e",
            "È|E",
            "è|e",
            "Ë|E",
            "ë|e",
            "Í|I",
            "í|i",
            "Ï|I",
            "ï|i",
            "Î|I",
            "î|i",
            "Ì|I",
            "ì|i",
            "Ó|O",
            "ó|o",
            "Ô|O",
            "ô|o",
            "Ò|O",
            "ò|o",
            "Õ|O",
            "õ|o",
            "ö|o",
            "Ö|O",
            "Ú|U",
            "ú|u",
            "û|u",
            "Û|U",
            "Ù|U",
            "ù|u",
            "ü|u",
            "Ü|U",
            "&amp;|&",
            "Ç|C",
            "ç|c",
            "ñ|n",
            "Ñ|N",
            "ª|",
            "º|",
            "°|",
            "´|",
            "ø|",
            "®|",
            "¿| ",
            "Ã¡|A",
            "²|",
            "&quot;|",
            "ï¿½|A",
            "NÃº|Nu",
            "Ã?|C",
            "Ã§|c",
            "&#xD;|",
            "A?|i",
            "&amp;#x0D;|",
            "{@E@}|",
            "&#x2013;|-"
        );


        foreach ($StrReplace as $CadaCaracter) {
            $tratarCaracteres = str_replace(explode("|", $CadaCaracter)[0], explode("|", $CadaCaracter)[1], $tratarCaracteres);
        }

        $tratarCaracteres = str_replace("<?xml version='1.0' encoding='UTF-8'?>", "", $tratarCaracteres);
        $tratarCaracteres = str_replace(chr(10) & chr(13), "", $tratarCaracteres);
        $tratarCaracteres = str_replace(chr(10), "", $tratarCaracteres);
        $tratarCaracteres = str_replace(chr(13), "", $tratarCaracteres);
        $tratarCaracteres = str_replace('<?xml version=\"1.0\" encoding=\"ISO-8859-1\" standalone=\"yes\"?>', "", $tratarCaracteres);
        $tratarCaracteres = str_replace('<?xml version=\"1.0\" encoding=\"iso-8859-1\" standalone=\"yes\"?>', "", $tratarCaracteres);
        $tratarCaracteres = str_replace('<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"yes\"?>', "", $tratarCaracteres);
        $tratarCaracteres = str_replace('<?xml version=\"1.0\" standalone=\"yes\"?>', "", $tratarCaracteres);
        $tratarCaracteres = str_replace('<?xml version=\"1.0\" encoding=\"UTF-8\"?>', "", $tratarCaracteres);
        $tratarCaracteres = str_replace('<?xml version=\"1.0\" encoding=\"utf-8\"?>', "", $tratarCaracteres);
        $tratarCaracteres = str_replace('<?xml version=\"1.0\" encoding=\"UTF-8\" ?>', "", $tratarCaracteres);
        $tratarCaracteres = str_replace('<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>', "", $tratarCaracteres);
        $tratarCaracteres = str_replace('<?xml version=\"1.0\" encoding=\"iso-8859-1\"?>', "", $tratarCaracteres);
        $tratarCaracteres = str_replace('<?xml version=\"1.0\"?>', "", $tratarCaracteres);
        $tratarCaracteres = str_replace('<?xml version = \"1.0\" encoding = \"utf-8\"?>', "", $tratarCaracteres);

        $Index = 1;
        while (strpos($tratarCaracteres, "&", $Index) !== false) {
            $Index = strpos($tratarCaracteres, "&", $Index);
            if (strpos(substr($tratarCaracteres, $Index, 6), ";") === false) {
                $Reconstruction = "";
                for ($Letter = 0; $Letter < strlen($tratarCaracteres); $Letter++) {
                    if ($Letter !== $Index) {
                        if ($Reconstruction === "") {
                            $Reconstruction = substr($tratarCaracteres, $Letter, 1);
                        } else {
                            $Reconstruction = $Reconstruction . substr($tratarCaracteres, $Letter, 1);
                        }
                    } else {
                        if ($Reconstruction === "") {
                            $Reconstruction = "&amp;";
                        } else {
                            $Reconstruction = $Reconstruction . "&amp;";
                        }
                    }
                }
                $tratarCaracteres = $Reconstruction;
                $Reconstruction = "";
            }
            $Index++;
        }
        $Index = 0;

        return $tratarCaracteres;
    }
}
