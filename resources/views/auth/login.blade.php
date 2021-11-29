@extends('layouts.guest')
@section('title', __('Login'))
@section('content')

    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        @if (session('message'))
            <div class="shadow bg-green-100 my-4 rounded p-2" role="alert">
                {{ session('message') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="relative w-full mb-3">
                <x-label :value="__('Email')" for="email" required />

                <input id="email" name="email" type="text"
                    class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 {{ $errors->has('email') ? ' border border-red-500' : '' }}"
                    required autocomplete="email" autofocus placeholder="{{ __('Email') }}"
                    value="{{ old('email', null) }}">

                @if ($errors->has('email'))
                    <div class="text-red-500">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>

            <div class="relative w-full mb-3">
                <x-label :value="__('Password')" for="grid-password" required />
                    
                <input id="password" name="password" type="password"
                    class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 {{ $errors->has('password') ? ' border border-red-500' : '' }}"
                    required placeholder="{{ __('Password') }}">

                @if ($errors->has('password'))
                    <div class="text-red-500">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>

            <div>
                <label class="inline-flex items-center cursor-pointer">
                    <x-checkbox name="remember" id="remember" />
                    <span class="ml-2 text-sm font-semibold text-gray-700">{{ __('Remember me') }}</span>
                </label>
            </div>
            <div class="text-center mt-6">
                <button
                    class="md:text-sm sm:text-xs bg-blue-900 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300 text-sm font-bold uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                    type="submit">
                    {{ __('Login') }}
                </button>
            </div>
            <div class="mt-6">
                <div class="flex flex-wrap mt-6">
                    @if (Route::has('password.request'))
                        <div class="w-1/2">
                            <a href="{{ route('password.request') }}">
                                <small>{{ __('Forgot password?') }}</small>
                            </a>
                        </div>
                    @endif
                    @if (Route::has('register'))
                        <div class="w-1/2 text-right">
                            <a href="{{ route('register') }}">
                                <small>
                                    {{ __('Create new account') }}
                                </small>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </form>
    </x-auth-card>
@endsection
