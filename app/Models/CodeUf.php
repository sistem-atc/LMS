<?php

namespace App\Models;

use App\Traits\Blameable;
use App\Models\DocumentFiscalCustomer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable;

class CodeUf extends Model implements Auditable
{
    /** @use HasFactory<\Database\Factories\CodeUfFactory> */
    use HasFactory;

    use SoftDeletes;

    use Blameable;

    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'code_uf',
        'federation_unit',
        'uf',
    ];

    public function document_fiscal_customer(): BelongsTo
    {
        return $this->BelongsTo(DocumentFiscalCustomer::class);
    }
}
