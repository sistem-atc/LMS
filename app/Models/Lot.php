<?php

namespace App\Models;

use App\Models\Branch;
use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable;

class Lot extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes;
    use Blameable;
    use \OwenIt\Auditing\Auditable;

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
}
