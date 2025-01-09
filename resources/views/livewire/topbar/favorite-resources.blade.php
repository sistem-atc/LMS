<div class="items-center hidden gap-x-3 lg:flex">
    @if (count($favorites) > 0)
        <span class="text-sm font-semibold text-gray-700 dark:text-white">{{ __('Favoritos') }}</span>

        <div class="flex items-center gap-x-5">
            @foreach ($favorites as $favorite)
                <x-filament::icon-button tag="a" size="xl" :tooltip="$favorite['name']" :icon="$favorite['icon']"
                    :href="$favorite['url']"></x-filament::icon-button>
            @endforeach
        </div>
    @endif
</div>
