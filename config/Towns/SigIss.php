<?php

use App\Services\Towns\Sigiss\Sigiss;

$class = Sigiss::class;

return [

    '3127701' => [
        'city_name' => 'Governador Valadares',
        'ibge'=> '3127701',
        'url_prod' => 'https://valadares.sigiss.com.br/valadares/ws/sigiss_ws.php',
        'url_homolog' => 'https://testevaladares.sigiss.com.br/testevaladares/ws/sigiss_ws.php',
        'headerversion' => null,
        'namespace' => '',
        'version' => null,
        'class_path' => $class
    ],

    '3524005' => [
        'city_name' => 'Marilia',
        'ibge'=> '3524005',
        'url_prod' => 'https://marilia.sigiss.com.br:443/marilia/ws/sigiss_ws.php',
        'url_homolog' => 'https://testemarilia.sigiss.com.br:443/testemarilia/ws/sigiss_ws.php',
        'headerversion' => null,
        'namespace' => '',
        'version' => null,
        'class_path' => $class
    ],

    '2100055' => [
        'city_name' => 'Açailândia',
        'ibge'=> '2100055',
        'url_prod' => 'https://acailandia.sigiss.com.br:443/acailandia/ws/sigiss_ws.php',
        'url_homolog' => null,
        'headerversion' => null,
        'namespace' => '',
        'version' => null,
        'class_path' => $class
    ],

];
