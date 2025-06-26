<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RulesAccount extends BaseModel
{
    /** @use HasFactory<\Database\Factories\RulesAccountFactory> */
    use HasFactory;

    public function primary_account(): HasOne
    {
        return $this->hasOne(Account::class);
    }

    public function counterparty_account(): HasOne
    {
        return $this->hasOne(Account::class);
    }

    public function nature(): BelongsTo
    {
        return $this->belongsTo(Nature::class);
    }

}
