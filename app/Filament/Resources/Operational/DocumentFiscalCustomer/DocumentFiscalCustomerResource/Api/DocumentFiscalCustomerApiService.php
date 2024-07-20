<?php
namespace App\Filament\Resources\Operational\DocumentFiscalCustomer\DocumentFiscalCustomerResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\Operational\DocumentFiscalCustomer\DocumentFiscalCustomerResource;


class DocumentFiscalCustomerApiService extends ApiService
{
    protected static string | null $resource = DocumentFiscalCustomerResource::class;

    public static function handlers() : array
    {
        return [
            Handlers\CreateHandler::class,
            Handlers\UpdateHandler::class,
            Handlers\DeleteHandler::class,
            Handlers\PaginationHandler::class,
            Handlers\DetailHandler::class
        ];

    }
}
