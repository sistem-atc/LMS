<?php

namespace App\Actions;

use App\Models\Bill;
use App\Services\Banks\BanksGateway\BanksStrategy;
use App\Services\Banks\BanksGateway\Contracts\BanksInterface;

class SendBill implements Action
{
    const NAMESPACE_SERVICE = 'App\\Services\\Banks\\Connectors\\';

    public static function execute(...$args)
    {
        dd($args);

        static::sendBills($args);

    }

    private static function sendBills(Bill $bill): void
    {
        app()->when(BanksStrategy::class)->needs(BanksInterface::class)->give(function () use ($bill) {
            $banktype = sprintf(self::NAMESPACE_SERVICE.'$sConnector', $bill->bank);

            return new $banktype;
        });

        $connector = app(BanksStrategy::class);
        $connector->get($bill->id);

    }
}
