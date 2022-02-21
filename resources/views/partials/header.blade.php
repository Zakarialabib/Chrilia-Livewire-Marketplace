<nav class="flex items-center border-b-2 px-3 flex-wrap bt-5 bg-black">
    <div class="p-2 mr-4 inline-flex items-center">
        <a class="no-underline hover:text-blue-200 hover:no-underline" href="/">
            <img src="{{ asset('uploads/' . config('settings.site_logo')) }}"
            class="block h-12 w-10/12">
        </a>
    </div>
    <div class="inline-flex p-3 rounded lg:hidden ml-auto outline-none nav-toggler">
        <button id="nav-toggle" class="flex items-center px-3 py-2 border">
            <svg class="fill-current h-3 w-3 text-white" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
            </svg>
        </button>
    </div>
   
    <div class="hidden top-navbar w-full lg:inline-flex lg:flex-grow lg:w-auto" id="nav-content">
        <ul
            class="lg:inline-flex lg:flex-row lg:ml-auto lg:w-auto w-full lg:items-center items-start flex flex-col lg:h-auto lg:p-5">
            <li class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-center items-center justify-center">
                <a class="text-white no-underline hover:text-blue-200 hover:text-underline"
                    href="{{ route('home') }}">{{ __('Home') }}</a>
            </li>
            <li class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-center items-center justify-center">
                <a class="text-white no-underline hover:text-blue-200 hover:text-underline"
                    href="{{ route('brands') }}">{{ __('Brands') }}</a>
            </li>
            <li class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-center items-center justify-center">
                <a class="text-white no-underline hover:text-blue-200 hover:text-underline"
                    href="{{ route('blog.index') }}">{{ __('Blog') }}</a>
            </li>
          
            <li class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-center items-center justify-center">
                <a class="text-white no-underline hover:text-blue-200 hover:text-underline"
                    href="#contact">{{ __('Contact') }}</a>
            </li>
            <hr class="mb-2 border-b-1 border-blueGray-200">
            @auth
                @if (auth()->user()->isAdmin())
                    <li class="lg:inline-flex lg:w-auto w-full px-3 rounded text-center items-center justify-center ">
                        <a class="text-white no-underline hover:text-blue-200 hover:text-underline"
                            href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="lg:inline-flex lg:w-auto w-full px-3 py-3 rounded text-center items-center justify-center">
                        <a class="text-white no-underline hover:text-blue-200 hover:text-underline"
                            href="{{ url('/logout') }}" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">{{ __('Logout') }} </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                @elseif (auth()->user()->isClient())
                    <li class="lg:inline-flex lg:w-auto w-full px-3 rounded text-center items-center justify-center ">
                        <a class="text-white no-underline hover:text-blue-200 hover:text-underline"
                            href="{{ route('client.home') }}">{{ __('Marketplace') }}</a>
                    </li>
                    <li class="lg:inline-flex lg:w-auto w-full px-3 py-3 rounded text-center items-center justify-center">
                        <a class="text-white no-underline hover:text-blue-200 hover:text-underline"
                            href="{{ url('/logout') }}" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">{{ __('Logout') }} </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                @elseif (auth()->user()->isVendor())
                    <li class="lg:inline-flex lg:w-auto w-full px-3 rounded text-center items-center justify-center ">
                        <a class="text-white no-underline hover:text-blue-200 hover:text-underline"
                            href="{{ route('vendor.home') }}">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="lg:inline-flex lg:w-auto w-full px-3 py-3 rounded text-center items-center justify-center">
                        <a class="text-white no-underline hover:text-blue-200 hover:text-underline"
                            href="{{ url('/logout') }}" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">{{ __('Logout') }} </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                @endif
            @endauth
            @guest
                <li class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-center items-center justify-center">
                    <a class="text-white no-underline hover:text-blue-200 hover:text-underline"
                        href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-center items-center justify-center">
                    <a class="text-white no-underline hover:text-blue-200 hover:text-underline"
                    href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endguest
            <li class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-center items-center justify-center">
                <a class="inline-flex items-center p-2 transition-colors font-medium select-none disabled:opacity-50 disabled:cursor-not-allowed focus:outline-none focus:ring focus:ring-offset-2 focus:ring-offset-white dark:focus:ring-offset-dark-eval-2 text-black dark:text-gray-400 dark:bg-dark-eval-1 dark:hover:bg-dark-eval-2 dark:hover:text-gray-200 rounded-md"
                    onclick="openDropdown(event,'language-dropdown')" aria-haspopup="true"
                    :aria-expanded="open ? 'true' : 'false'">
                    <img src="{{ flagImageUrl(\Illuminate\Support\Facades\App::getLocale()) }}"
                        class="px-2 drop-shadow-xl shadow-lg border-white" lazy>
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
    </div>
</nav>
