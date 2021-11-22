@extends('layouts.dashboard')
@section('title', __('Edit - ') . ($order->code))
@section('content')
    <div class="card bg-white dark:bg-dark-eval-1">
        <div class="p-6 rounded-t rounded-r mb-0 border-b border-blueGray-200">
            <div class="card-header-container flex flex-wrap">
                <h6 class="text-xl font-bold text-gray-700 dark:text-gray-300">
                    {{ __('Order code') }}
                    {{ $order->code }}
                </h6>
            </div>
        </div>

        <div class="p-4">
            <div class="flex flex-wrap">
                <div class="lg:w-1/2 sm:w-full p-2">
                    @livewire('admin.order.edit' ,[$order])
                </div>
                <div class="lg:w-1/2 sm:w-full p-2">
                    @livewire('admin.order.comments-list', ['orderId' => $order->id], key($order->id))
                </div>
            </div>
        </div>
    </div>
@endsection
