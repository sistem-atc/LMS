<?php

namespace App\Services\Banks\Itau\Concerns;

use App\Models\Bank;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\PendingRequest;
use App\Services\Banks\Itau\Concerns\GetTokenItau;

trait ItauConfig
{

    public function __construct(
        protected ?PendingRequest $http = null,
        protected ?Model $databank = null,
    ) {
        $environment = app()->isLocal() ? 'sandbox' : 'production';
        $url = config("itau.{$environment}.url");
        $token = GetTokenItau::refreshToken();
        $databank = Bank::where('codigo', '=', 341)->first();

        $this->databank = $databank;

        $this->http = Http::withHeaders([
                'Authorization', 'Bearer ' .$token,
                'x-itau-apikey: ' . $databank->client_secret,
                'x-itau-correlationID: ' . $databank->client_id,
                'x-itau-flowID: 1'
            ])->baseUrl($url);
    }

}
