<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends BaseModel
{
    /** @use HasFactory<\Database\Factories\ServiceFactory> */
    use HasFactory;

    public function group_service(): BelongsTo
    {
        return $this->belongsTo(GroupService::class, 'group_service_id');
    }
}
