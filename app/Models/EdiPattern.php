<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class EdiPattern extends BaseModel
{
    /** @use HasFactory<\Database\Factories\EdiPatternFactory> */
    use HasFactory;

    protected $casts = [
        'group' => 'array',
    ];
}
