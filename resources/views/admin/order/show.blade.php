@extends('layouts.dashboard')
@section('title', __('Show - ') . ($order->code))
@section('content')
    <div class="card bg-white dark:bg-dark-eval-1">
        <div class="p-6 rounded-t rounded-r mb-0 border-b border-blueGray-200">
            <div class="card-header-container flex flex-wrap">
                <h6 class="text-xl font-bold text-gray-700 dark:text-gray-300">
                    {{ __('Order code') }} :
                    {{ $order->code }}
                </h6>
                <div class="float-right">
                    <a href="{{ route('admin.orders.edit', $order) }}"
                        class="md:text-sm sm:text-xs bg-blue-900 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300 text-sm font-bold uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150">
                        {{ __('Edit') }}
                    </a>
                    <a href="{{ route('admin.orders.index') }}"
                        class="btn rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition bg-gray-300 text-black hover:text-blue-800 hover:bg-blue-200 active:bg-blue-200 focus:ring-blue-300">
                        {{ __('Go back') }}
                    </a>
                </div>
            </div>
        </div>
        <div wire:loading.flex
            class="z-50 static flex left-0 justify-center py-2 top-0 bottom-0 w-full bg-gray-200 bg-opacity-50">
            <div class=" text-red-600 font-bold text-center"> {{ __('Loading') }}</div>
        </div>
        <div class="p-4">
            <div class="p-2">
                <table class="table table-view w-full">
                    <tbody>
                        <tr>
                            <th>
                                {{ __('Code') }}
                            </th>
                            <td>
                                {{ $order->code }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ __('Status') }}
                            </th>
                            <td>
                                @if ($order->status == \App\Models\Order::STATUS_PENDING)
                                    <span class="badge text-white bg-green-500">{{ __('Pending') }}</span>
                                @elseif($order->status == \App\Models\Order::STATUS_PROCESSING)
                                    <span class="badge bg-blue-500 text-white">{{ __('Processing') }}</span>
                                @elseif($order->status == \App\Models\Order::STATUS_COLLECTING)
                                    <span class="badge text-white bg-red-500">{{ __('Collecting') }}</span>
                                @elseif($order->status == \App\Models\Order::STATUS_CONFIRMED)
                                    <span class="badge bg-blue-300 text-black ">{{ __('Confirmed') }}</span>
                                @elseif($order->status == \App\Models\Order::STATUS_SHIPPING)
                                    <span class="badge tbg-orange-500 text-white">{{ __('Shipping') }}</span>
                                @elseif($order->status == \App\Models\Order::STATUS_CANCELED)
                                    <span class="badge text-white bg-red-500">{{ __('Canceled') }}</span>
                                @elseif($order->status == \App\Models\Order::STATUS_COMPLETED)
                                    <span class="badge bg-green-700 text-white ">{{ __('Completed') }}</span>
                                @elseif($order->status == \App\Models\Order::STATUS_RETURNED)
                                    <span class="badge bg-red-700 text-white">{{ __('Returned') }}</span>
                                @elseif($order->status == \App\Models\Order::STATUS_PAID)
                                    <span class="badge bg-blue-700 text-white">{{ __('PAID') }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ __('Vendor') }}
                            </th>
                            <td>
                                {{ $order->client ? $order->client->name : 'N/A' }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ __('Product name') }}
                            </th>
                            <td>
                                {{ $order->product_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ __('Price') }}
                            </th>
                            <td>
                                {{ $order->price }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ __('Order route') }}
                            </th>
                            <td>
                                {{ $order->subscription->name }} - {{ $order->subscription->details }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
