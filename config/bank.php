<?php

use App\Services\Banks\Banks\Bradesco\Bradesco;
use App\Services\Banks\Banks\Itau\Itau;

return [
    '341' => Itau::class,
    'homolog-billings' => [
        'urlToken' => env('ITAU_SANDBOX_URL_TOKEN'),
        'url' => env('ITAU_SANDBOX_URL_BILLING') . '/' . env('ITAU_API_VERSION'),
        'clientId' => env('ITAU_SANDBOX_CLIENT_ID_BILLING'),
        'clientSecret' => env('ITAU_SANDBOX_CLIENT_SECRET_BILLING'),
    ],
    'prod-billings' => [
        'urlToken' => env('ITAU_PRODUCTION_URL_TOKEN'),
        'url' => env('ITAU_PRODUCTION_URL_BILLING') . '/' . env('ITAU_API_VERSION'),
        'clientId' => env('ITAU_PRODUCTION_CLIENT_ID_BILLING'),
        'ITAU_PRODUCTION_CLIENT_SECRET_BILLING' => env('ITAU_PRODUCTION_CLIENT_SECRET'),
    ],
    '237' => Bradesco::class,
];
