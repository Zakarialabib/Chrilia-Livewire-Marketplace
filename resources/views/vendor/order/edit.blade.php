@extends('layouts.dashboard')
@section('title', __('Edit - ') . ($order->code))
@section('content')
<div class="card bg-white dark:bg-dark-eval-1">
    <div class="p-6 rounded-t rounded-r mb-0 border-b border-blueGray-200">
        <div class="card-header-container flex flex-wrap">
            <h6 class="text-xl font-bold text-gray-700 dark:text-gray-300">
                {{ __('Order') }} : 
                {{ $order->code }}
            </h6>
        </div>
    </div>

    <div class="p-4">
        @livewire('vendor.order.edit' ,[$order])
    </div>
</div>
@endsection