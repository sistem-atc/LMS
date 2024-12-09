<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CitySetting extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Blameable;

    protected $fillable = [
        'ibge',
        'city_name',
        'url_prod',
        'url_homolog',
        'headerversion',
        'namespace',
        'version',
        'class_path',
    ];
}
