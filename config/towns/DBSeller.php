<?php

use App\Services\Towns\Dbseller\Dbseller;

$class = Dbseller::class;

return [

    '4317103' => [
        'city_name' => 'Sant Ana do Livramento',
        'ibge'=> '4317103',
        'url_prod' => 'https://nfe.sdolivramento.com.br/webservice/index/producao',
        'url_homolog' => 'https://nfe.sdolivramento.com.br/webservice/index/homologacao',
        'headerversion' => null,
        'namespace' => '',
        'version' => null,
        'class_path' => $class
    ],

];
