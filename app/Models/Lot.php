<?php

namespace App\Models;

use App\Models\Branch;
use App\Traits\Blameable;
use App\Models\DocumentFiscalCustomer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lot extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Blameable;

    protected $fillable = [
        'origin_branche_id',
        'collection_request',
        'status',
        'quotation',
        'key_doct_fiscal',
    ];

    protected $casts = [
        'key_doct_fiscal' => 'array',
    ];

    public function branch(): BelongsTo
    {
        return $this->BelongsTo(Branch::class);
    }

    public function origin_branch(): BelongsTo
    {
        return $this->BelongsTo(Branch::class);
    }

    public function document_fiscal_customer(): BelongsTo
    {
        return $this->BelongsTo(DocumentFiscalCustomer::class);
    }

}
