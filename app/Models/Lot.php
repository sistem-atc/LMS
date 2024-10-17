<?php

namespace App\Models;

use App\Models\Branch;
use App\Traits\Blameable;
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
