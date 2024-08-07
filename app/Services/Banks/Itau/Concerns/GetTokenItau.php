<?php

namespace App\Services\Banks\Itau\Concerns;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class GetTokenItau
{

    private static string $url = 'https://sts.itau.com.br/api/oauth/token';

    public static function refreshToken(): ?string
    {

        $token = Cache::get('token');

        if (!$token){

            $databank = DB::table('banks')
                ->where('codigo', '=', 341)
                ->get();

            $body = 'grant_type=client_credentials&client_id=' . $databank->first()->client_id . '&client_secret=' .
            $databank->first()->client_secret;

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => self::$url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_SSLCERT => Storage::path($databank->first()->path_crt),
                CURLOPT_SSLKEY => Storage::path($databank->first()->path_key),
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $body,
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/x-www-form-urlencoded',
                    'x-itau-flowID: 1',
                    'x-itau-correlationID: 2',
                ),
            ));

            $response = curl_exec($curl);
            curl_close($curl);
            $explode_id = json_decode($response, true);
            $token = cache::put('token', $explode_id['access_token'], $explode_id['expires_in']);

        };

        return $token = Cache::get('token');;

    }
}
