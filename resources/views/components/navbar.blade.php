<nav aria-label="secondary" x-data="{ open: false }"
    class="sticky top-0 z-10 flex items-center justify-between px-4 py-4 sm:px-6 transition-transform duration-500 bg-white dark:bg-dark-eval-1"
    :class="{
        '-translate-y-full': scrollingDown,
        'translate-y-0': scrollingUp,
    }">

    <div class="flex items-center gap-3">
        <x-button type="button" class="md:hidden" iconOnly variant="secondary" srText="Toggle dark mode"
            @click="toggleTheme">
            <x-heroicon-o-moon x-show="!isDarkMode" aria-hidden="true" class="w-6 h-6" />
            <x-heroicon-o-sun x-show="isDarkMode" aria-hidden="true" class="w-6 h-6" />
        </x-button>
    </div>

    <div class="flex items-center gap-3">

        @if (auth()->user()->isAdmin())
            <div class="md:flex hidden flex-row flex-wrap items-center lg:ml-auto mr-3">

                @livewire('admin.cache')
            </div>
        @endif
        <x-button type="button" class="hidden md:inline-flex" iconOnly variant="secondary" srText="Toggle dark mode"
            @click="toggleTheme">
            <x-heroicon-o-moon x-show="!isDarkMode" aria-hidden="true" class="w-6 h-6" />
            <x-heroicon-o-sun x-show="isDarkMode" aria-hidden="true" class="w-6 h-6" />
        </x-button>
        <button onClick="window.location.reload();"
            class="inline-flex items-center transition-colors font-medium select-none disabled:opacity-50 disabled:cursor-not-allowed focus:outline-none focus:ring focus:ring-offset-2 focus:ring-offset-white dark:focus:ring-offset-dark-eval-2 p-2 bg-white text-gray-500 hover:bg-gray-100 focus:ring-blue-500 dark:text-gray-400 dark:bg-dark-eval-1 dark:hover:bg-dark-eval-2 dark:hover:text-gray-200 rounded-md md:inline-flex">
            <x-heroicon-o-refresh class="flex-shrink-0 w-5 h-5 mr-2" aria-hidden="true" />
        </button>

        <ul class="items-center md:flex flex-wrap list-none">
            <li class="inline-block relative">
                @livewire('notifications')
            </li>

            <li class="inline-block relative">
                <a class="inline-flex items-center p-2 transition-colors font-medium select-none disabled:opacity-50 disabled:cursor-not-allowed focus:outline-none focus:ring focus:ring-offset-2 focus:ring-offset-white dark:focus:ring-offset-dark-eval-2 bg-white text-gray-500 hover:bg-gray-100 focus:ring-blue-500 dark:text-gray-400 dark:bg-dark-eval-1 dark:hover:bg-dark-eval-2 dark:hover:text-gray-200 rounded-md"
                    onclick="openDropdown(event,'language-dropdown')" aria-haspopup="true"
                    :aria-expanded="open ? 'true' : 'false'">
                    <img src="{{ flagImageUrl(\Illuminate\Support\Facades\App::getLocale()) }}"
                        class="px-2">
                    @if (count($languages) > 1)
                        <x-heroicon-o-chevron-down class="flex-shrink-0 w-4 h-4" aria-hidden="true" />
                    @endif
                </a>
                @if (count($languages) > 1)
                    <ul id="language-dropdown"
                        class="bg-white text-gray-500 focus:ring focus:ring-offset-2 focus:ring-blue-500 dark:text-gray-400 dark:bg-dark-eval-1 transition-colors z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48 hidden"
                        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(617px, 58px);">
                        @foreach ($languages as $language)
                            @if (\Illuminate\Support\Facades\App::getLocale() !== $language->code)
                                <li class="flex">
                                    <a class="py-2 px-4 text-sm dark:hover:bg-gray-600 dark:hover:text-gray-200 w-full whitespace-nowrap"
                                        href="{{ route('change_language', $language->code) }}"
                                        title="{{ $language->name }}">
                                        {{ $language->name }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                @endif
            </li>
        </ul>
        <ul class="flex-col md:flex-row list-none items-center md:flex">
            <a class="inline-flex items-center p-2 transition-colors font-medium select-none disabled:opacity-50 disabled:cursor-not-allowed focus:outline-none focus:ring focus:ring-offset-2 focus:ring-offset-white dark:focus:ring-offset-dark-eval-2 text-gray-500 hover:bg-gray-100 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-dark-eval-2 dark:hover:text-gray-200 rounded-md"
                onclick="openDropdown(event,'user-dropdown')" aria-haspopup="true"
                :aria-expanded="open ? 'true' : 'false'">
                {{ Auth::user()->name }}
                <x-heroicon-o-chevron-down class="flex-shrink-0 w-4 h-4" aria-hidden="true" />
            </a>
            <div data-popper-placement="bottom-start" id="user-dropdown"
                class="bg-white text-gray-500 focus:ring focus:ring-offset-2 focus:ring-blue-500 dark:text-gray-400 dark:bg-dark-eval-1 dark:hover:bg-dark-eval-2 transition-colors z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48 hidden"
                style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(617px, 58px);">
                @if (auth()->user()->isAdmin())
                    <a href="{{ route('admin.profile') }}"
                        class="block py-2 px-4 text-sm dark:hover:bg-gray-600 dark:hover:text-gray-200 w-full whitespace-nowrap">
                        {{ __('Profil') }}
                    </a>
                    <a href="{{ url('admin/settings') }}"
                        class="block py-2 px-4 text-sm dark:hover:bg-gray-600 dark:hover:text-gray-200 w-full whitespace-nowrap">
                        {{ __('Settings') }}
                    </a>
                @endif
                <a class="block py-2 px-4 text-sm dark:hover:bg-gray-600 dark:hover:text-gray-200 w-full whitespace-nowrap"
                    href="{{ url('/logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
                @forelse(auth()->user()->alerts()->latest()->take(10)->get() as $alert)
                    <a
                        class="flex flex-wrap py-2 px-4 text-sm dark:hover:bg-gray-600 dark:hover:text-gray-200 w-full whitespace-nowrap {{ $alert->pivot->seen_at ? 'text-gray-400' : 'dark:text-gray-200' }}">
                        <x-heroicon-o-speakerphone class="w-6 h-6 mr-2 text-red-600" aria-hidden="true" />
                        {{ $alert->message }}
                    </a>
                @empty
                    <span
                        class="block py-2 px-4 text-sm dark:hover:bg-gray-600 dark:hover:text-gray-200 w-full whitespace-nowrap">
                        {{ __('No Alerts') }}
                    </span>
                @endforelse
            </div>
        </ul>
    </div>
</nav>

<!-- Mobile bottom bar -->
<div class="fixed inset-x-0 bottom-0 z-10 flex items-center justify-between px-4 py-4 sm:px-6 transition-transform duration-500 bg-white lg:hidden dark:bg-dark-eval-1"
    :class="{
        'translate-y-full': scrollingDown,
        'translate-y-0': scrollingUp,
    }">

    <a href="{{ route('admin.dashboard') }}">
        <x-application-logo aria-hidden="true" class="w-10 h-10" />
        <span class="sr-only">{{ config('settings.site_title') }}</span>
    </a>

    <x-button type="button" iconOnly variant="secondary" srText="Open main menu"
        @click="isSidebarOpen = !isSidebarOpen">
        <x-heroicon-o-menu x-show="!isSidebarOpen" aria-hidden="true" class="w-6 h-6" />
        <x-heroicon-o-x x-show="isSidebarOpen" aria-hidden="true" class="w-6 h-6" />
    </x-button>
</div>
