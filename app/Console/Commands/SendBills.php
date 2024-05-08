<?php

namespace App\Console\Commands;

use App\Models\Bill;
use Illuminate\Console\Command;
use App\Services\Banks\BanksGateway\BanksStrategy;
use App\Services\Banks\BanksGateway\Contracts\BanksInterface;

class SendBills extends Command
{

    const NAMESPACE_SERVICE = 'App\\Services\\Banks\\Connectors\\';

    protected $signature = 'app:send-bills';

    protected $description = 'Command Send Bill to Banks';

    public function handle(Bill $bill): void
    {
        dd($bill);

        app()->when(BanksStrategy::class)->needs(BanksInterface::class)->give(function() use ($bill) {
            $banktype = sprintf(self::NAMESPACE_SERVICE . '$sConnector', $bill->bank);
            return new $banktype;
        });

        $connector = app(BanksStrategy::class);
        $connector->get($bill->id);

    }
}
