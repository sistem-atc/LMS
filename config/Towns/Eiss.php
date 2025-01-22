<?php

use App\Services\Towns\Eiss\Eiss;

$class = Eiss::class;

return [

    '3505708' => [
        'city_name' => 'Barueri',
        'ibge'=> '3505708',
        'url_prod' => 'https://www.barueri.sp.gov.br/nfeservice/wsrps.asmx',
        'url_homolog' => 'https://testeeiss.barueri.sp.gov.br/nfeservice/wsrps.asmx',
        'headerversion' => null,
        'namespace' => '',
        'version' => null,
        'class_path' => $class
    ],
];
