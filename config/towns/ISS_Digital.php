<?php

use App\Services\Towns\ISS_Digital\ISS_Digital;

$class = ISS_Digital::class;

return [

    '2211001' =>
    [
        'city_name' => 'Teresina',
        'ibge'=> '2211001',
        'url_prod' => 'https://www.issdigitalthe.com.br/WsNFe2/LoteRps.jws',
        'url_homolog' => '',
        'headerversion' => null,
        'namespace' => '',
        'version' => null,
        'class_path' => $class
    ],

    '3509502' =>
    [
        'city_name' => 'Campinas',
        'ibge'=> '3509502',
        'url_prod' => 'https://issdigital.campinas.sp.gov.br/WsNFe2/LoteRps.jws',
        'url_homolog' => '',
        'headerversion' => null,
        'namespace' => '',
        'version' => null,
        'class_path' => $class
    ],

    '5002704' =>
    [
        'city_name' => 'Campo Grande',
        'ibge'=> '5002704',
        'url_prod' => 'https://issdigital.pmcg.ms.gov.br/WsNFe2/LoteRps.jws',
        'url_homolog' => '',
        'headerversion' => null,
        'namespace' => '',
        'version' => null,
        'class_path' => $class
    ],

    '3170206' =>
    [
        'city_name' => 'Uberlandia',
        'ibge'=> '3170206',
        'url_prod' => 'https://udigital.uberlandia.mg.gov.br/WsNFe2/LoteRps.jws',
        'url_homolog' => '',
        'headerversion' => null,
        'namespace' => '',
        'version' => null,
        'class_path' => $class
    ],

];
