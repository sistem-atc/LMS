<?php

$version = env('ITAU_API_VERSION');

return [
    'sandbox' => [
        'urlToken' => env('ITAU_SANDBOX_URL_TOKEN'),
        'url' => env('ITAU_SANDBOX_URL_BILLING') . '/' . $version,
        'clientId' => env('ITAU_SANDBOX_CLIENT_ID_BILLING'),
        'clientSecret' => env('ITAU_SANDBOX_CLIENT_SECRET_BILLING'),
    ],
    'production' => [
        'urlToken' => env('ITAU_PRODUCTION_URL_TOKEN'),
        'url' => env('ITAU_PRODUCTION_URL_BILLING') . '/' . $version,
        'clientId' => env('ITAU_PRODUCTION_CLIENT_ID_BILLING'),
        'ITAU_PRODUCTION_CLIENT_SECRET_BILLING' => env('ITAU_PRODUCTION_CLIENT_SECRET'),
    ],
];
