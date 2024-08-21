<?php

namespace App\Models;

use App\Models\Branch;
use App\Traits\Blameable;
use App\Models\DocumentFiscalCustomer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lot extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Blameable;

    protected $fillable = [
        'branche_id',
        'collection_request',
        'status',
        'quotation',
    ];

    public function branche(): BelongsTo
    {
        return $this->BelongsTo(Branch::class);
    }

    public function documentFiscalCustomer(): HasMany
    {
        return $this->hasMany(DocumentFiscalCustomer::class);
    }

}
