<?php

namespace App\Filament\Resources\Operational\DocumentFiscalCustomer\DocumentFiscalCustomerResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use App\Filament\Resources\Operational\DocumentFiscalCustomer\DocumentFiscalCustomerResource;

class PaginationHandler extends Handlers
{
    public static string | null $uri = '/';
    public static string | null $resource = DocumentFiscalCustomerResource::class;
    public static bool $public = true;

    public function handler()
    {
        $query = static::getEloquentQuery();
        $model = static::getModel();

        $query = QueryBuilder::for($query)
            ->allowedFields($model::$allowedFields ?? [])
            ->allowedSorts($model::$allowedSorts ?? [])
            ->allowedFilters($model::$allowedFilters ?? [])
            ->allowedIncludes($model::$allowedIncludes ?? null)
            ->paginate(request(null)->query('per_page'))
            ->appends(request(null)->query());

        return static::getApiTransformer()::collection($query);
    }
}
