<?php

$version = env('ITAU_API_VERSION');

return [
    'sandbox' => [
        'url' => env('ITAU_SANDBOX_URL') . '/' . $version,
        'clientId' => env('ITAU_SANDBOX_CLIENT_ID'),
        'clientSecret' => env('ITAU_SANDBOX_CLIENT_SECRET'),
    ],
    'production' => [
        'url' => env('ITAU_PRODUCTION_URL') . '/' . $version,
        'clientId' => env('ITAU_PRODUCTION_CLIENT_ID'),
        'clientSecret' => env('ITAU_PRODUCTION_CLIENT_SECRET'),
    ],
];
