@extends('layouts.guest')
@section('title', __('Register'))
@section('content')
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Name -->
            <div class="flex flex-wrap -m-2">
                <div class="lg:w-1/2 sm:w-full p-2">
                <x-label for="name" :value="__('Name')" required/>

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="lg:w-1/2 sm:w-full p-2">
                <x-label for="email" :value="__('Email')" required/>

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
            </div>

            <div class="flex flex-wrap -m-2">
                <div class="lg:w-1/2 sm:w-full p-2 mt-4">
                <x-label for="phone" :value="__('Phone')" required/>

                <x-input id="phone" class="block mt-1 w-full" type="number" name="phone" :value="old('phone')" required />
            </div>

            <div class="lg:w-1/2 sm:w-full p-2 mt-4">
                <x-label for="company_name" :value="__('Company name')" />

                <x-input id="company_name" class="block mt-1 w-full" type="text" name="company_name" :value="old('company_name')" />
            </div>
            </div>
            
            <div class="mt-4">
                <x-label for="address" :value="__('Address')" required />

                <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" required />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" required />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            @if (config('settings.enableRegistrationTerms') == 1)
            <div class="mt-4"> 
                <div class="flex items-center">
                    <x-checkbox name="terms" id="terms"/>
                    <div class="ml-2">
                        {!! __('I agree to the :terms_of_service ', [
                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                        ]) !!}
                    </div>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
@endsection