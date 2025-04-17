<?php

namespace App\Services\Banks\Itau\Methods;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

trait Token
{

    public function refreshToken($data): void
    {

        $token = Cache::get('token');

        if (!$token) {

            $body = 'grant_type=client_credentials&client_id=' . $data['client_id'] . '&client_secret=' . $data['client_secret'];

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $data['urlToken'],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_SSLCERT => Storage::path($data['path_crt']),
                CURLOPT_SSLKEY => Storage::path($data['path_key']),
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

        }
        ;

    }
}
