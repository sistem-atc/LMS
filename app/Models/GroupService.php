<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GroupService extends Model implements Auditable
{
    /** @use HasFactory<\Database\Factories\GroupServiceFactory> */
    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    use Blameable;

    public function services(): HasMany
    {
        return $this->hasMany(Service::class, 'group_service_id');
    }

}
