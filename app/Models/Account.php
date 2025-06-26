<?php

namespace App\Models;

use App\Enums\AccountType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Account extends Model
{
    /** @use HasFactory<\Database\Factories\AccountFactory> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'type' => AccountType::class
        ];
    }

    public function rules_account(): BelongsTo
    {
        return $this->belongsTo(RulesAccount::class);
    }

    public function costcenter(): HasOne
    {
        return $this->hasOne(Costcenter::class);
    }
}
