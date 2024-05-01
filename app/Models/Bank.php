<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bank extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'cnpj',
        'codigo',
        'agencia',
        'dv_agencia',
        'conta',
        'dv_conta',
        'nome_banco',
        'postal_code',
        'street',
        'complement',
        'number',
        'district',
        'city',
        'state',
        'ibge',
        'gia',
        'ddd',
        'siafi',
        'contato',
        'use_api',
        'use_cnab',
        'model_cnab',
        'client_id',
        'client_secret',
        'path_crt',
        'path_key',
        'fine',
        'interests',
        'protest',
        'days_protest',
        'wallet',
        'coin_type',
        'default_message',
        'default_message2',
        'default_message3',
        'blocked',
        'date_blocked',
    ];

    public function bill(): HasOne
    {
        return $this->hasOne(Bill::class);
    }

    public function customer(): HasMany
    {
        return $this->hasMany(Customer::class);
    }
}
