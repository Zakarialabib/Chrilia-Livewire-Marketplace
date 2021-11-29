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
                <div class="w-full grid mb-4">
                    <div
                        class="flex items-center p-4 bg-blueGray-50 dark:bg-dark-bg dark:text-gray-300 rounded-lg shadow-xs">
                        <div class="p-5 mr-4 text-blue-500 bg-blue-100 rounded-full">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="mb-2 text-lg font-medium text-gray-600 dark:text-gray-300">
                                {{ __('Products') }}
                            </p>
                            <p class="text-lg font-bold text-gray-700 dark:text-gray-300">
                                {{ $products_data }}
                            </p>
                        </div>
                    </div>
                </div>
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
