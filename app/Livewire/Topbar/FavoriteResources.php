<?php

namespace App\Livewire\Topbar;

use App\Models\FavoriteResource;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class FavoriteResources extends Component
{

    public array $favorites;

    public function mount()
    {
        $user = Auth::user();

        $this->favorites = collect(
            Cache::get(
                sprintf(FavoriteResource::$cacheKey, $user->id),
                $user->favoriteResources()->get()->toArray()
            )
        )
            ->transform(function (array $favorite) {

                $class = app($favorite['name']);
                $name = $class instanceof Resource ? $class::getTitleCaseModelLabel() : $class->getTitle();
                $icon = $class::getNavigationIcon();

                return [
                    'name' => $name,
                    'url' => $class::getUrl(),
                    'icon' => $icon,
                ];
            })
            ->toArray();
    }

    public function render()
    {
        return view('livewire.topbar.favorite-resources');
    }
}
