<?php

namespace App\Models;

use Filament\Panel;
use App\Traits\Blameable;
use Laravel\Sanctum\HasApiTokens;
use Filament\Models\Contracts\HasName;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use BezhanSalleh\FilamentShield\Traits\HasPanelShield;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser, HasName
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use HasPanelShield;
    use SoftDeletes;
    use HasRoles;
    use Blameable;

    public function getFilamentName(): string
    {
        return $this->employee->name;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'branche_logged_id',
        'is_active',
        'remember_last_module',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_active' => 'boolean',
    ];

    public function canAccessPanel(Panel $panel): bool
    {
        return str_ends_with($this->email, config('domain.domain')) && $this->is_active;
    }

    public function employee(): HasOne
    {
        return $this->hasOne(Employee::class);
    }

    public function branch_logged(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function favoriteResources(): HasMany
    {
        return $this->hasMany(FavoriteResource::class);
    }
}
