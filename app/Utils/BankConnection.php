<?php

namespace App\Utils;

use App\Logs\Logging;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\PendingRequest;

trait BankConnection
{

    public function make(array $data, array $headers): PendingRequest
    {

        return Http::withHeaders($headers)
            ->withToken(cache('token'))
            ->baseUrl($data['url'])
            ->throw()
            ->tap(
                function (PendingRequest $request) use ($data): void {
                    $request->beforeSending(
                        fn($request, $options) =>
                        Logging::logRequest($request, $options, $data['bank'])
                    );
                }
            );

    }

}
