<?php

namespace App\Models;

use App\Traits\Blameable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class MultiSoftware extends Model implements Auditable
{
    use SoftDeletes;
    use HasRoles;
    use Blameable;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'Filial Origem',
        'Numero Documento',
        'Serie',
    ];
}
