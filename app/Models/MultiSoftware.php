<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MultiSoftware extends Model
{
    use SoftDeletes;
    use HasRoles;

    protected $fillable = [
        'Filial Origem',
        'Numero Documento',
        'Serie',
    ];
}
