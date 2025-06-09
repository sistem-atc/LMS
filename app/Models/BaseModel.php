<?php

namespace App\Models;

use App\Traits\Blameable;
use App\Attributes\EntryPoint;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;

#[EntryPoint()]
class BaseModel extends Model implements Auditable
{

    use SoftDeletes;

    use Blameable;

    use \OwenIt\Auditing\Auditable;

    use HasRoles;

}
