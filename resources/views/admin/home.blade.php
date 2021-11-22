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
                            <div class="grid gap-6 mb-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 w-full">
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

                                <div class="flex items-center p-4 bg-white dark:bg-dark-bg dark:text-gray-300 rounded-lg shadow-xs">
                                    <div class="p-5 mr-4 text-green-500 bg-green-100 rounded-full">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="mb-2 text-lg font-medium text-gray-600 dark:text-gray-300">
                                            {{ __('Payments') }}
                                        </p>
                                        <p class="text-lg font-bold text-gray-700 dark:text-gray-300">
                                            {{ $d['paymentTotal'] }} {{ config('settings.currency_symbol') }}
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-center p-4 bg-white dark:bg-dark-bg dark:text-gray-300 rounded-lg shadow-xs">
                                    <div class="p-5 mr-4 text-orange-500 bg-orange-100 rounded-full ">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="mb-2 text-lg font-medium text-gray-600 dark:text-gray-300">
                                            {{ __('Users') }}
                                        </p>
                                        <p class="text-lg font-bold text-gray-700 dark:text-gray-300">
                                            {{ $d['users'] }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="grid gap-6 mb-8 xs:grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 w-full">

                                <div class="flex items-center p-4 bg-green-500 rounded-lg shadow-xs">
                                    <div class="w-1/2">
                                        <p class="mb-2 text-sm font-medium text-white">
                                            {{ __('Order Pending') }}
                                        </p>
                                        <p class="text-2xl font-semibold text-white  ">
                                            {{ $d['STATUS_PENDING'] }}
                                        </p>
                                    </div>
                                    <div class="w-1/2 text-gray-500 flex justify-end opacity-50">
                                        
                                    </div>
                                </div>

                                <div class="flex items-center p-4 bg-blue-500 rounded-lg shadow-xs">
                                    <div class="w-1/2">
                                        <p class="mb-2 text-sm font-medium text-white">
                                            {{ __('Order Processing') }}
                                        </p>
                                        <p class="text-2xl font-semibold text-white  ">
                                            {{ $d['STATUS_PROCESSING'] }}
                                        </p>
                                    </div>
                                    <div class="w-1/2 text-gray-500 flex justify-end opacity-50">
                                        
                                    </div>
                                </div>


                                <div class="flex items-center p-4 bg-indigo-500 rounded-lg shadow-xs">
                                    <div class="w-1/2">
                                        <p class="mb-2 text-sm font-medium text-white">
                                            {{ __('Order Collecting') }}
                                        </p>
                                        <p class="text-2xl font-semibold text-white  ">
                                            {{ $d['STATUS_COLLECTING'] }}
                                        </p>
                                    </div>
                                    <div class="w-1/2 text-gray-500 flex justify-end opacity-50">
                                        
                                    </div>
                                </div>


                                <div class="flex items-center p-4 bg-blue-300 rounded-lg shadow-xs">
                                    <div class="w-1/2">
                                        <p class="mb-2 text-sm font-medium text-white">
                                            {{ __('Order Confirmed') }}
                                        </p>
                                        <p class="text-2xl font-semibold text-white  ">
                                            {{ $d['STATUS_CONFIRMED'] }}
                                        </p>
                                    </div>
                                    <div class="w-1/2 text-gray-500 flex justify-end opacity-50">
                                        
                                    </div>
                                </div>


                                <div class="flex items-center p-4 bg-orange-500 rounded-lg shadow-xs">
                                    <div class="w-1/2">
                                        <p class="mb-2 text-sm font-medium text-white">
                                            {{ __('Order Shipping') }}
                                        </p>
                                        <p class="text-2xl font-semibold text-white  ">
                                            {{ $d['STATUS_SHIPPING'] }}
                                        </p>
                                    </div>
                                    <div class="w-1/2 text-gray-500 flex justify-end opacity-50">
                                        
                                    </div>
                                </div>


                                <div class="flex items-center p-4 bg-red-500 rounded-lg shadow-xs">
                                    <div class="w-1/2">
                                        <p class="mb-2 text-sm font-medium text-white">
                                            {{ __('Order Canceled') }}
                                        </p>
                                        <p class="text-2xl font-semibold text-white  ">
                                            {{ $d['STATUS_CANCELED'] }}
                                        </p>
                                    </div>
                                    <div class="w-1/2 text-gray-500 flex justify-end opacity-50">
                                        
                                    </div>
                                </div>


                                <div class="flex items-center p-4 bg-green-700 rounded-lg shadow-xs">
                                    <div class="w-1/2">
                                        <p class="mb-2 text-sm font-medium text-white">
                                            {{ __('Order Completed') }}
                                        </p>
                                        <p class="text-2xl font-semibold text-white  ">
                                            {{ $d['STATUS_COMPLETED'] }}
                                        </p>
                                    </div>
                                    <div class="w-1/2 text-gray-500 flex justify-end opacity-50">
                                        
                                    </div>
                                </div>


                                <div class="flex items-center p-4 bg-red-700 rounded-lg shadow-xs">
                                    <div class="w-1/2">
                                        <p class="mb-2 text-sm font-medium text-white">
                                            {{ __('Order Returned') }}
                                        </p>
                                        <p class="text-2xl font-semibold text-white  ">
                                            {{ $d['STATUS_RETURNED'] }}
                                        </p>
                                    </div>
                                    <div class="w-1/2 text-gray-500 flex justify-end opacity-50">
                                        
                                    </div>
                                </div>


                                <div class="flex items-center p-4 bg-blue-700 rounded-lg shadow-xs">
                                    <div class="w-1/2">
                                        <p class="mb-2 text-sm font-medium text-white">
                                            {{ __('Order Paid') }}
                                        </p>
                                        <p class="text-2xl font-semibold text-white ">
                                            {{ $d['STATUS_PAID'] }}
                                        </p>
                                    </div>
                                    <div class="w-1/2 text-gray-500 flex justify-end opacity-50">
                                        
                                    </div>
                                </div>

                            </div>
                        </div>
                    @else
                        <div class="row js-date-row" style="display: none" id="{{ $key }}">
                            <div class="grid gap-6 mb-8 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 w-full">

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

                                <div class="flex items-center p-4 bg-white dark:bg-dark-bg dark:text-gray-300 rounded-lg shadow-xs">
                                    <div class="p-5 mr-4 text-green-500 bg-green-100 rounded-full">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="mb-2 text-lg font-medium text-gray-600 dark:text-gray-300">
                                            {{ __('Payments') }}
                                        </p>
                                        <p class="text-lg font-bold text-gray-700 dark:text-gray-300">
                                            {{ $d['paymentTotal'] }} {{ config('settings.currency_symbol') }}
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-center p-4 bg-white dark:bg-dark-bg dark:text-gray-300 rounded-lg shadow-xs">
                                    <div class="p-5 mr-4 text-orange-500 bg-orange-100 rounded-full ">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="mb-2 text-lg font-medium text-gray-600 dark:text-gray-300">
                                            {{ __('Users') }}
                                        </p>
                                        <p class="text-lg font-bold text-gray-700 dark:text-gray-300">
                                            {{ $d['users'] }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="grid gap-6 mb-8 xs:grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 w-full">

                                <div class="flex items-center p-4 bg-green-500 rounded-lg shadow-xs">
                                    <div class="w-1/2">
                                        <p class="mb-2 text-sm font-medium text-white">
                                            {{ __('Order Pending') }}
                                        </p>
                                        <p class="text-2xl font-semibold text-white  ">
                                            {{ $d['STATUS_PENDING'] }}
                                        </p>
                                    </div>
                                    <div class="w-1/2 text-gray-500 flex justify-end opacity-50">
                                        
                                    </div>
                                </div>

                                <div class="flex items-center p-4 bg-blue-500 rounded-lg shadow-xs">
                                    <div class="w-1/2">
                                        <p class="mb-2 text-sm font-medium text-white">
                                            {{ __('Order Processing') }}
                                        </p>
                                        <p class="text-2xl font-semibold text-white  ">
                                            {{ $d['STATUS_PROCESSING'] }}
                                        </p>
                                    </div>
                                    <div class="w-1/2 text-gray-500 flex justify-end opacity-50">
                                        
                                    </div>
                                </div>


                                <div class="flex items-center p-4 bg-indigo-500 rounded-lg shadow-xs">
                                    <div class="w-1/2">
                                        <p class="mb-2 text-sm font-medium text-white">
                                            {{ __('Order Collecting') }}
                                        </p>
                                        <p class="text-2xl font-semibold text-white  ">
                                            {{ $d['STATUS_COLLECTING'] }}
                                        </p>
                                    </div>
                                    <div class="w-1/2 text-gray-500 flex justify-end opacity-50">
                                        
                                    </div>
                                </div>

                                <div class="flex items-center p-4 bg-blue-300 rounded-lg shadow-xs">
                                    <div class="w-1/2">
                                        <p class="mb-2 text-sm font-medium text-white">
                                            {{ __('Order Confirmed') }}
                                        </p>
                                        <p class="text-2xl font-semibold text-white  ">
                                            {{ $d['STATUS_CONFIRMED'] }}
                                        </p>
                                    </div>
                                    <div class="w-1/2 text-gray-500 flex justify-end opacity-50">
                                        
                                    </div>
                                </div>

                                <div class="flex items-center p-4 bg-orange-500 rounded-lg shadow-xs">
                                    <div class="w-1/2">
                                        <p class="mb-2 text-sm font-medium text-white">
                                            {{ __('Order Shipping') }}
                                        </p>
                                        <p class="text-2xl font-semibold text-white  ">
                                            {{ $d['STATUS_SHIPPING'] }}
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-center p-4 bg-red-500 rounded-lg shadow-xs">
                                    <div class="w-1/2">
                                        <p class="mb-2 text-sm font-medium text-white">
                                            {{ __('Order Canceled') }}
                                        </p>
                                        <p class="text-2xl font-semibold text-white  ">
                                            {{ $d['STATUS_CANCELED'] }}
                                        </p>
                                    </div>
                                    <div class="w-1/2 text-gray-500 flex justify-end opacity-50">
                                        
                                    </div>
                                </div>

                                <div class="flex items-center p-4 bg-green-700 rounded-lg shadow-xs">
                                    <div class="w-1/2">
                                        <p class="mb-2 text-sm font-medium text-white">
                                            {{ __('Order Completed') }}
                                        </p>
                                        <p class="text-2xl font-semibold text-white  ">
                                            {{ $d['STATUS_COMPLETED'] }}
                                        </p>
                                    </div>
                                    <div class="w-1/2 text-gray-500 flex justify-end opacity-50">
                                        
                                    </div>
                                </div>

                                <div class="flex items-center p-4 bg-red-700 rounded-lg shadow-xs">
                                    <div class="w-1/2">
                                        <p class="mb-2 text-sm font-medium text-white">
                                            {{ __('Order Returned') }}
                                        </p>
                                        <p class="text-2xl font-semibold text-white  ">
                                            {{ $d['STATUS_RETURNED'] }}
                                        </p>
                                    </div>
                                    <div class="w-1/2 text-gray-500 flex justify-end opacity-50">
                                        
                                    </div>
                                </div>

                                <div class="flex items-center p-4 bg-blue-700 rounded-lg shadow-xs">
                                    <div class="w-1/2">
                                        <p class="mb-2 text-sm font-medium text-white">
                                            {{ __('Order Paid') }}
                                        </p>
                                        <p class="text-2xl font-semibold text-white ">
                                            {{ $d['STATUS_PAID'] }}
                                        </p>
                                    </div>
                                    <div class="w-1/2 text-gray-500 flex justify-end opacity-50">
                                        
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endif
                @endforeach
                {{-- Line chart --}}
                <div class="px-4">
                    <div class="relative flex flex-col min-w-0 break-words bg-white p-4 rounded mb-6 shadow-lg">
                        @livewire('admin.dashboard')
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    
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
        
</script>
    @endpush
