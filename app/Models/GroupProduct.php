<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GroupProduct extends BaseModel
{
    /** @use HasFactory<\Database\Factories\GroupProductFactory> */
    use HasFactory;

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'group_product_id');
    }

}
