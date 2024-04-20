<?php

namespace App\Models;

use App\Enums\TypeFreightEnum;
use App\Enums\WeekdayEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentTerm extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'type_freight', 'weekday', 'especific_date', 'term',
    ];

    protected $casts = [
        'weekday' => WeekdayEnum::class,
        'type_freight' => TypeFreightEnum::class,
    ];
}
