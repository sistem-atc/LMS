<?php

use App\Services\Towns\INfse\INfse;

$class = INfse::class;

return [

    '4314407' => [
        'city_name' => 'Pelotas',
        'ibge'=> '4314407',
        'url_prod' => 'https://ws.pelotas.rs.gov.br/wsnfse/NfseWSISAPI.dll/soap/INfse',
        'url_homolog' => 'https://wshomo.pelotas.rs.gov.br/wsnfse/NfseWSISAPI.dll/soap/INfse',
        'headerversion' => '2.02',
        'namespace' => '',
        'version' => null,
        'class_path' => $class
    ],
];
