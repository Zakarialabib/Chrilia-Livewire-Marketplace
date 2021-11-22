<nav class="flex items-center border-b-2 px-3 flex-wrap bt-5 bg-indigo-600">
    <div class="p-2 mr-4 inline-flex items-center">
        <a class="no-underline hover:text-blue-200 hover:no-underline" href="#">
            <x-application-logo class="block h-12 w-auto" />
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
            class="lg:inline-flex lg:flex-row lg:ml-auto lg:w-auto w-full lg:items-center items-start flex flex-col lg:h-auto">
            <li class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-center items-center justify-center">
                <a class="text-white no-underline hover:text-blue-200 hover:text-underline"
                    href="{{ route('home') }}">{{ __('Home') }}</a>
            </li>
            <li class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-center items-center justify-center">
                <a class="text-white no-underline hover:text-blue-200 hover:text-underline"
                    href="{{ route('page.index') }}">{{ __('Pages') }}</a>
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
        </ul>
    </div>
</nav>
