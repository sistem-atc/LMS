<?php

namespace App\Models;

use App\Traits\Blameable;
use App\Enums\WeekdayEnum;
use App\Enums\TypeFreightEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentTerm extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Blameable;

    protected $fillable = [
        'name', 'type_freight', 'weekday', 'especific_date', 'term',
    ];

    protected $casts = [
        'weekday' => 'array',
        'type_freight' => 'array',
        'especific_date' => 'array',
    ];

    public function Customer(): HasOne
    {
        return $this->hasOne(Customer::class);
    }
}
