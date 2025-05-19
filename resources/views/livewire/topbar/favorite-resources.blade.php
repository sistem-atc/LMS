<div x-data="{ open: false }" class="relative">
    <button
        @click="open = !open"
        class="flex items-center p-2 text-sm font-semibold text-gray-700 transition-colors duration-200 bg-white border border-gray-300 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700"
    >
        <span>{{ __('Favoritos') }}</span>
        <x-heroicon-o-chevron-down class="w-4 h-4" />
    </button>

    <div
        x-show="open"
        @click.away="open = false"
        x-transition
        class="absolute z-50 w-64 mt-2 bg-white rounded-lg shadow-lg dark:bg-gray-800 ring-1 ring-black ring-opacity-5"
    >

        @if (count($favorites) > 0)

            <ul class="py-2 text-sm text-gray-700 dark:text-gray-100">
                @foreach ($favorites as $favorite)
                    <li>
                        <a
                            href="{{ $favorite['url'] }}"
                            class="flex items-center p-2 text-sm font-semibold text-gray-700 gap-x-2 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700"
                        >
                            <x-dynamic-component
                                :component="$favorite['icon']"
                                class="w-5 h-5" />
                            <span>{{ $favorite['name'] }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>

        @else
            <div class="p-4 text-sm text-gray-500 dark:text-gray-400">
                {{ __('Nenhum Favorito.') }}
            </div>
        @endif
    </div>
</div>
