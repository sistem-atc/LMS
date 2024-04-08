<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Costcenter extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'cost_center',
        'classification',
        'description',
        'blocked',
        'blocked_date',
        'email_approver'
    ];
}
