<?php

namespace App\Models;

use App\Traits\Blameable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MultiSoftware extends Model
{
    use SoftDeletes;
    use HasRoles;
    use Blameable;

    protected $fillable = [
        'Filial Origem',
        'Numero Documento',
        'Serie',
    ];
}
