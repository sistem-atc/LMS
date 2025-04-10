<?php

namespace App\Services\Utils\Banks\Connectors;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\PendingRequest;
use App\Services\Utils\Banks\Interface\BankInterface;

abstract class BankConnector implements BankInterface
{

    protected static string $carteira;
    protected static string $id_beneficiario;
    protected static Model $modelBank;
    protected static Model $customer;
    protected static ?PendingRequest $http;

}
