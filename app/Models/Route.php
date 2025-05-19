<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Route extends BaseModel
{
    /** @use HasFactory<\Database\Factories\RouteFactory> */
    use HasFactory;

    public function origin_branch(): BelongsTo
    {
        return $this->BelongsTo(Branch::class);
    }

    public function recipient_branch(): BelongsTo
    {
        return $this->BelongsTo(Branch::class);
    }

    public function travel(): HasMany
    {
        return $this->hasMany(Travel::class);
    }
}
