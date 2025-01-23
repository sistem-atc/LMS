<?php

use App\Services\Towns\Dsf\Dsf;

$class = Dsf::class;

return [

    '3549904' => //São José do Campos
    [
        'city_name' => 'São José do Campos',
        'ibge'=> '3549904',
        'url_prod' => 'https://notajoseense.sjc.sp.gov.br/notafiscal-ws/NotaFiscalSoap',
        'url_homolog' => 'https://homol-notajoseense.sjc.sp.gov.br/notafiscal-ws/NotaFiscalSoap',
        'headerversion' => 'v1',
        'namespace' => '',
        'version' => null,
        'class_path' => $class
    ],

];
