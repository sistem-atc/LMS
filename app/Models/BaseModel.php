<?php

namespace App\Models;

use App\Traits\Blameable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;

abstract class BaseModel extends Model implements Auditable
{

    use SoftDeletes;

    use Blameable;

    use \OwenIt\Auditing\Auditable;

    use HasRoles;

    use \App\Traits\EntryPoint;

    protected static function booted(): void
    {
        static::saving(function ($model) {
            self::triggerEntryPoint($model);
        });
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * The attributes that should be appended to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [];

}
