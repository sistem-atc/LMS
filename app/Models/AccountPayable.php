<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable;

class AccountPayable extends Model implements Auditable
{
    /** @use HasFactory<\Database\Factories\AccountPayableFactory> */
    use HasFactory;

    use SoftDeletes;

    use Blameable;

    use \OwenIt\Auditing\Auditable;

}
