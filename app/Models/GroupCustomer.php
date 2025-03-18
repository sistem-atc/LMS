<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable;

class GroupCustomer extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes;
    use Blameable;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'name',
        'description'
    ];
}
