<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model implements Auditable
{
    /** @use HasFactory<\Database\Factories\SupplierFactory> */
    use HasFactory;
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;
    use Blameable;

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function nature(): BelongsTo
    {
        return $this->belongsTo(Nature::class);
    }
}
