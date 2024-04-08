<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Route extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'active',
        'origin_branche_id',
        'recipient_branche_id',
        'municipal_route'
    ];

    public function origin_branch(): BelongsTo
    {
        return $this->BelongsTo(Branch::class);
    }

    public function recipient_branch(): BelongsTo
    {
        return $this->BelongsTo(Branch::class);
    }
}
