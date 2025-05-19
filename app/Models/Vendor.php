<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vendor extends BaseModel
{
    /** @use HasFactory<\Database\Factories\VendorFactory> */
    use HasFactory;

    public function branch(): BelongsTo
    {
        return $this->BelongsTo(Branch::class);
    }
}
