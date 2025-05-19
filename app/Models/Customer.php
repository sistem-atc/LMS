<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends BaseModel
{

    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;

    use HasApiTokens;

    protected $casts = [
        'complete' => 'boolean',
    ];

    public function bank(): BelongsTo
    {
        return $this->BelongsTo(Bank::class);
    }

    public function branch(): BelongsTo
    {
        return $this->BelongsTo(Branch::class);
    }

    public function nature(): BelongsTo
    {
        return $this->BelongsTo(Nature::class);
    }

    public function vendor(): BelongsTo
    {
        return $this->BelongsTo(Vendor::class);
    }

    public function group_customer(): BelongsTo
    {
        return $this->BelongsTo(GroupCustomer::class);
    }

    public function edi_pattern(): BelongsTo
    {
        return $this->belongsTo(EdiPattern::class);
    }

    public function payment_term(): BelongsTo
    {
        return $this->BelongsTo(PaymentTerm::class);
    }

    public function bill(): HasMany
    {
        return $this->HasMany(Bill::class);
    }

    public function document_fiscal_customer(): HasMany
    {
        return $this->HasMany(DocumentFiscalCustomer::class);
    }

    public function freight_table(): BelongsTo
    {
        return $this->BelongsTo(FreightTable::class);
    }
}
