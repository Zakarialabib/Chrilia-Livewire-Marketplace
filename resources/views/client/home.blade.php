@extends('layouts.dashboard-full')
@section('title' , __('Order Dashboard') )
@section('content')

<div class="row">
    <div class="card bg-white dark:bg-dark-eval-1 w-full">
        <div class="p-6 rounded-t rounded-r mb-0 border-b border-blueGray-200">
            <div class="card-row">
                <h6 class="text-xl font-bold text-gray-700 dark:text-gray-300">
                    {{__('Dashboard')}}
                </h6>
            </div>
        </div>

        <div class="p-4">
            @livewire('vendor.orders')
        </div>
    </div>
</div>

@endsection