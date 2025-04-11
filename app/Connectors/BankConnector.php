<?php

namespace App\Services\Utils\Banks\Connectors;

use App\Interface\BankInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\PendingRequest;

abstract class BankConnector implements BankInterface
{

    protected static string $carteira;
    protected static string $id_beneficiario;
    protected static Model $modelBank;
    protected static Model $customer;
    protected static ?PendingRequest $http;

}
