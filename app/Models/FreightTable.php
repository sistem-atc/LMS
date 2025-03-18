<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class FreightTable extends Model implements Auditable
{
    use HasFactory, SoftDeletes, Blameable;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'routes',
        'is_active',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'routes' => 'array',
        'is_active' => 'boolean',
    ];
}
