<?php

namespace App\Models;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lot extends BaseModel
{
    /** @use HasFactory<\Database\Factories\LotFactory> */
    use HasFactory;

    public function branche(): BelongsTo
    {
        return $this->BelongsTo(Branch::class);
    }
}
