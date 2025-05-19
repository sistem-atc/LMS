<?php

namespace App\Models;

use App\Models\DocumentFiscalCustomer;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CodeUf extends BaseModel
{
    /** @use HasFactory<\Database\Factories\CodeUfFactory> */
    use HasFactory;

    public function document_fiscal_customer(): BelongsTo
    {
        return $this->BelongsTo(DocumentFiscalCustomer::class);
    }
}
