<?php

declare(strict_types=1);

namespace App\Services\Banks\BanksGateway\Connector\Itau\Concerns;

use App\Models\Bank;
use App\Services\Banks\Itau\Endpoints\GetTokenItau;
use Filament\Forms\Components\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

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
