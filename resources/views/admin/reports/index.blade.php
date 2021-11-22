@extends('layouts.dashboard')
@section('title', __('Orders Report'))
@section('content')
    <div class="card bg-white dark:bg-dark-eval-1">
        <div class="p-6 rounded-t rounded-r mb-0 border-b border-blueGray-200Ò">
            <div class="card-header-container flex flex-wrap">
                <h6 class="text-xl font-bold text-gray-700 dark:text-gray-300">
                    {{ __('Orders Report') }}
                </h6>
            </div>
        </div>
        <div x-data="{
        openTab: 1,
        activeClasses: 'border rounded-t text-purple-500',
        inactiveClasses: 'text-purple-600 hover:text-purple-800'}" class="p-4">
            <ul class="flex border-b">
                <li @click="openTab = 1" :class="{ '-mb-px': openTab === 1 }" class="-mb-px mr-1">
                    <a :class="openTab === 1 ? activeClasses : inactiveClasses"
                        class="inline-block py-2 px-4 text-purple-500 hover:text-purple-800 font-semibold" href="#">
                        {{ __('Orders Report') }}</a>
                </li>
                {{-- <li @click="openTab = 2" :class="{ '-mb-px': openTab === 2 }" class="mr-1">
                    <a :class="openTab === 2 ? activeClasses : inactiveClasses"
                        class="inline-block py-2 px-4 text-purple-500 hover:text-purple-800 font-semibold"
                        href="#">
                        Coming Soon</a>
                </li>
                <li @click="openTab = 3" :class="{ '-mb-px': openTab === 3 }" class="mr-1">
                    <a :class="openTab === 3 ? activeClasses : inactiveClasses"
                        class="inline-block py-2 px-4 text-purple-500 hover:text-purple-800 font-semibold"
                        href="#">
                        Coming Soon</a>
                </li> --}}
            </ul>
            <div class="w-full pt-4">
                <div x-show="openTab === 1">
                    @livewire('admin.reports.orders-report' )
                </div>
                {{-- <div x-show="openTab === 2">

                </div>
                <div x-show="openTab === 3">

                </div> --}}
            </div>
        </div>
    </div>
@endsection
