@extends('layouts.dashboard')
@section('title', __('Dashboard'))
@section('content')
    <div class="row">
        <div class="card bg-white dark:bg-dark-eval-1 w-full">
            <div class="p-6 rounded-t rounded-r mb-0 border-b border-blueGray-200">
                <div class="card-row">
                    <h6 class="text-xl font-bold text-gray-700 dark:text-gray-300">
                        {{ __('Dashboard') }}
                    </h6>
                </div>
            </div>
            <div class="p-4">
                <div class="md:inline-flex float-right px-4 py-4 sm:flex sm:flex-wrap">
                    <button type="button" data-date="today"
                        class="js-date btn rounded-md md:text-sm sm:text-xs mt-2 font-medium border-0 focus:outline-none focus:ring transition bg-purple-600 text-white hover:text-purple-800 hover:bg-purple-100 active:bg-purple-200 focus:ring-purple-300 active">
                        {{ __('Today') }}
                    </button>

                    <button type="button" data-date="month"
                        class="js-date btn rounded-md md:text-sm sm:text-xs mt-2 font-medium border-0 focus:outline-none focus:ring transition bg-purple-600 text-white hover:text-purple-800 hover:bg-purple-100 active:bg-purple-200 focus:ring-purple-300">
                        {{ __('Last month') }}
                    </button>

                    <button type="button" data-date="semi"
                        class="js-date btn rounded-md md:text-sm sm:text-xs mt-2 font-medium border-0 focus:outline-none focus:ring transition bg-purple-600 text-white hover:text-purple-800 hover:bg-purple-100 active:bg-purple-200 focus:ring-purple-300">
                        {{ __('Last 6 month') }}
                    </button>

                    <button type="button" data-date="year"
                        class="js-date btn rounded-md md:text-sm sm:text-xs mt-2 font-medium border-0 focus:outline-none focus:ring transition bg-purple-600 text-white hover:text-purple-800 hover:bg-purple-100 active:bg-purple-200 focus:ring-purple-300">
                        {{ __('Last year') }}
                    </button>
                </div>
                @foreach ($data as $key => $d)
                    @if ($loop->first)
                        <div class="row js-date-row" id="{{ $key }}">
                            <div class="w-full grid mb-4">
                                <div class="flex items-center p-4 bg-white dark:bg-dark-bg dark:text-gray-300 rounded-lg shadow-xs">
                                    <div class="p-5 mr-4 text-blue-500 bg-blue-100 rounded-full">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="mb-2 text-lg font-medium text-gray-600 dark:text-gray-300">
                                            {{ __('Orders') }}
                                        </p>
                                        <p class="text-lg font-bold text-gray-700 dark:text-gray-300">
                                            {{ $d['orders'] }} /
                                            <span class="text-sm right-2"> {{ $d['orderTotal'] }} {{ config('settings.currency_symbol') }} </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="grid gap-6 mb-4 xs:grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 w-full">

                                <div class="flex items-center p-4 bg-green-500 rounded-lg shadow-xs">
                                    <div>
                                        <p class="mb-2 text-sm font-medium text-white">
                                            {{ __('Order Pending') }}
                                        </p>
                                        <p class="text-2xl font-semibold text-white  ">
                                            {{ $d['STATUS_PENDING'] }}
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-center p-4 bg-blue-500 rounded-lg shadow-xs">
                                    <div>
                                        <p class="mb-2 text-sm font-medium text-white">
                                            {{ __('Order Processing') }}
                                        </p>
                                        <p class="text-2xl font-semibold text-white  ">
                                            {{ $d['STATUS_PROCESSING'] }}
                                        </p>
                                    </div>
                                </div>


                                <div class="flex items-center p-4 bg-indigo-500 rounded-lg shadow-xs">
                                    <div>
                                        <p class="mb-2 text-sm font-medium text-white">
                                            {{ __('Order Collecting') }}
                                        </p>
                                        <p class="text-2xl font-semibold text-white  ">
                                            {{ $d['STATUS_COLLECTING'] }}
                                        </p>
                                    </div>
                                </div>


                                <div class="flex items-center p-4 bg-blue-300 rounded-lg shadow-xs">
                                    <div>
                                        <p class="mb-2 text-sm font-medium text-white">
                                            {{ __('Order Confirmed') }}
                                        </p>
                                        <p class="text-2xl font-semibold text-white  ">
                                            {{ $d['STATUS_CONFIRMED'] }}
                                        </p>
                                    </div>
                                </div>


                                <div class="flex items-center p-4 bg-orange-500 rounded-lg shadow-xs">
                                    <div>
                                        <p class="mb-2 text-sm font-medium text-white">
                                            {{ __('Order Shipping') }}
                                        </p>
                                        <p class="text-2xl font-semibold text-white  ">
                                            {{ $d['STATUS_SHIPPING'] }}
                                        </p>
                                    </div>
                                </div>


                                <div class="flex items-center p-4 bg-red-500 rounded-lg shadow-xs">
                                    <div>
                                        <p class="mb-2 text-sm font-medium text-white">
                                            {{ __('Order Canceled') }}
                                        </p>
                                        <p class="text-2xl font-semibold text-white  ">
                                            {{ $d['STATUS_CANCELED'] }}
                                        </p>
                                    </div>
                                </div>


                                <div class="flex items-center p-4 bg-green-700 rounded-lg shadow-xs">
                                    <div>
                                        <p class="mb-2 text-sm font-medium text-white">
                                            {{ __('Order Completed') }}
                                        </p>
                                        <p class="text-2xl font-semibold text-white  ">
                                            {{ $d['STATUS_COMPLETED'] }}
                                        </p>
                                    </div>
                                </div>


                                <div class="flex items-center p-4 bg-red-700 rounded-lg shadow-xs">
                                    <div>
                                        <p class="mb-2 text-sm font-medium text-white">
                                            {{ __('Order Returned') }}
                                        </p>
                                        <p class="text-2xl font-semibold text-white  ">
                                            {{ $d['STATUS_RETURNED'] }}
                                        </p>
                                    </div>
                                </div>


                                <div class="flex items-center p-4 bg-blue-700 rounded-lg shadow-xs">
                                    <div>
                                        <p class="mb-2 text-sm font-medium text-white">
                                            {{ __('Order Paid') }}
                                        </p>
                                        <p class="text-2xl font-semibold text-white ">
                                            {{ $d['STATUS_PAID'] }}
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @else
                        <div class="row js-date-row" style="display: none" id="{{ $key }}">
                            <div class="">
                                <div class="flex items-center p-4 bg-white dark:bg-dark-bg dark:text-gray-300 rounded-lg shadow-xs">
                                    <div class="p-5 mr-4 text-blue-500 bg-blue-100 rounded-full">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="mb-2 text-lg font-medium text-gray-600 dark:text-gray-300">
                                            {{ __('Orders') }}
                                        </p>
                                        <p class="text-lg font-bold text-gray-700 dark:text-gray-300">
                                            {{ $d['orders'] }} /
                                            <span class="text-sm right-2"> {{ $d['orderTotal'] }} {{ config('settings.currency_symbol') }} </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="grid gap-6 mb-8 xs:grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 w-full">

                                <div class="flex items-center p-4 bg-green-500 rounded-lg shadow-xs">
                                    <div>
                                        <p class="mb-2 text-sm font-medium text-white">
                                            {{ __('Order Pending') }}
                                        </p>
                                        <p class="text-2xl font-semibold text-white  ">
                                            {{ $d['STATUS_PENDING'] }}
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-center p-4 bg-blue-500 rounded-lg shadow-xs">
                                    <div>
                                        <p class="mb-2 text-sm font-medium text-white">
                                            {{ __('Order Processing') }}
                                        </p>
                                        <p class="text-2xl font-semibold text-white  ">
                                            {{ $d['STATUS_PROCESSING'] }}
                                        </p>
                                    </div>
                                </div>


                                <div class="flex items-center p-4 bg-indigo-500 rounded-lg shadow-xs">
                                    <div>
                                        <p class="mb-2 text-sm font-medium text-white">
                                            {{ __('Order Collecting') }}
                                        </p>
                                        <p class="text-2xl font-semibold text-white  ">
                                            {{ $d['STATUS_COLLECTING'] }}
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-center p-4 bg-blue-300 rounded-lg shadow-xs">
                                    <div>
                                        <p class="mb-2 text-sm font-medium text-white">
                                            {{ __('Order Confirmed') }}
                                        </p>
                                        <p class="text-2xl font-semibold text-white  ">
                                            {{ $d['STATUS_CONFIRMED'] }}
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-center p-4 bg-orange-500 rounded-lg shadow-xs">
                                    <div>
                                        <p class="mb-2 text-sm font-medium text-white">
                                            {{ __('Order Shipping') }}
                                        </p>
                                        <p class="text-2xl font-semibold text-white  ">
                                            {{ $d['STATUS_SHIPPING'] }}
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-center p-4 bg-red-500 rounded-lg shadow-xs">
                                    <div>
                                        <p class="mb-2 text-sm font-medium text-white">
                                            {{ __('Order Canceled') }}
                                        </p>
                                        <p class="text-2xl font-semibold text-white  ">
                                            {{ $d['STATUS_CANCELED'] }}
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-center p-4 bg-green-700 rounded-lg shadow-xs">
                                    <div>
                                        <p class="mb-2 text-sm font-medium text-white">
                                            {{ __('Order Completed') }}
                                        </p>
                                        <p class="text-2xl font-semibold text-white  ">
                                            {{ $d['STATUS_COMPLETED'] }}
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-center p-4 bg-red-700 rounded-lg shadow-xs">
                                    <div>
                                        <p class="mb-2 text-sm font-medium text-white">
                                            {{ __('Order Returned') }}
                                        </p>
                                        <p class="text-2xl font-semibold text-white  ">
                                            {{ $d['STATUS_RETURNED'] }}
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-center p-4 bg-blue-700 rounded-lg shadow-xs">
                                    <div>
                                        <p class="mb-2 text-sm font-medium text-white">
                                            {{ __('Order Paid') }}
                                        </p>
                                        <p class="text-2xl font-semibold text-white ">
                                            {{ $d['STATUS_PAID'] }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
       (function($) {
        "use strict";
        
        document.querySelectorAll('.js-date').forEach(el => {
            el.addEventListener('click', event => {
                clearActive();
                hideAll();
                el.classList.add('active');
                document.querySelector(`#${el.dataset.date}`).style.display = 'flex';
            });
        });
        
        const clearActive = () => {
            document.querySelectorAll('.js-date').forEach(el => {
                el.classList.remove('active');
            });
        };
        
        const hideAll = () => {
            document.querySelectorAll('.js-date-row').forEach(el => {
                el.style.display = 'none';
            });
        };
        
    })(jQuery);
    </script>
@endpush
