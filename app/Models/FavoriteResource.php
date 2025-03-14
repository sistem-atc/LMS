<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class FavoriteResource extends Model
{
    public static $cacheKey = 'favorite_resources:%s';

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function isFavorite($className): bool
    {
        return FavoriteResource::where([
            'user_id' => Auth::user()->id,
            'name' => $className,
        ])->exists();
    }

    public static function toggleFavorite($className)
    {

        if (FavoriteResource::isFavorite($className)) {
            FavoriteResource::where([
                'user_id' => Auth::user()->id,
                'name' => $className,
            ])->delete();

            return false;
        }

        FavoriteResource::create([
            'user_id' => Auth::user()->id,
            'name' => $className,
        ]);

        return true;
    }
}
