<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GroupService extends BaseModel
{
    /** @use HasFactory<\Database\Factories\GroupServiceFactory> */
    use HasFactory;

    public function services(): HasMany
    {
        return $this->hasMany(Service::class, 'group_service_id');
    }

}
