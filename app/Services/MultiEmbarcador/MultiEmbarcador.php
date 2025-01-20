<?php

namespace App\Services\MultiEmbarcador;

use App\Models\Customer;
use Illuminate\Support\Facades\Http;

class MultiEmbarcador
{

    public static $clients = [];

    public function __construct(Customer $customer){

        self::$clients = $customer->where('BaseEndpoint', '!=', '')->get()->toArray();

    }

    public static function BuscarCTes(string $date_Initial, string $date_Out, int $firstCte = 0)
    {
        $Endpoint = 'CTe.svc';
        $SendXml = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:tem="http://tempuri.org/">' .
                        '<soapenv:Header>' .
                        '<Token xmlns="Token">TOKEN</Token>' .
                        '</soapenv:Header>' .
                        '<soapenv:Body>' .
                            '<tem:BuscarCTesPorPeriodo>' .
                                '<tem:dataInicial>DATA_INICIO</tem:dataInicial>' .
                                '<tem:dataFinal>DATA_FINAL</tem:dataFinal>' .
                                '<tem:tipoDocumentoRetorno>XML</tem:tipoDocumentoRetorno>' .
                                '<tem:inicio>PRIMEIRO_NUMERO</tem:inicio>' .
                                '<tem:limite>49</tem:limite>' .
                            '</tem:BuscarCTesPorPeriodo>' .
                        '</soapenv:Body>' .
                    '</soapenv:Envelope>';

        foreach(self::$clients as $client){
            $SendXml = str_replace('TOKEN', $client['Token'], $SendXml);
            $SendXml = str_replace('DATA_INICIO', $date_Initial, $SendXml);
            $SendXml = str_replace('DATA_FINAL', $date_Out, $SendXml);
            $SendXml = str_replace('PRIMEIRO_NUMERO', $firstCte, $SendXml);

            dd(Http::withBody($SendXml,"text/xml")->post($client['BaseEndpoint'] . $Endpoint));
        };
    }
}
