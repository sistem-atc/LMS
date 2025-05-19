<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DocumentFiscalCustomer extends BaseModel
{

    /** @use HasFactory<\Database\Factories\DocumentFiscalCustomerFactory> */
    use HasFactory;

    public static function getAllowedFields(): array
    {
        return [];
    }

    public static function getAllowedFilters(): array
    {
        return [];
    }

    public function sender_customer(): BelongsTo
    {
        return $this->BelongsTo(Customer::class);
    }

    public function recipient_customer(): BelongsTo
    {
        return $this->BelongsTo(Customer::class);
    }

    public function emit_customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function codeuf(): BelongsTo
    {
        return $this->belongsTo(CodeUf::class);
    }

    public function lot(): BelongsTo
    {
        return $this->belongsTo(Lot::class);
    }
}
