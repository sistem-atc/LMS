<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model implements Auditable
{
    /** @use HasFactory<\Database\Factories\ServiceFactory> */
    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    use Blameable;

    public function group_service(): BelongsTo
    {
        return $this->belongsTo(GroupService::class, 'group_service_id');
    }
}
