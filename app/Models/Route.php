<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Route extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Blameable;

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
