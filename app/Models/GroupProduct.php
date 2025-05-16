<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GroupProduct extends Model implements Auditable
{
    /** @use HasFactory<\Database\Factories\GroupProductFactory> */
    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    use Blameable;

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'group_product_id');
    }

}
