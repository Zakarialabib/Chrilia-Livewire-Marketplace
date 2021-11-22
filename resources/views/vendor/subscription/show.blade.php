@extends('layouts.dashboard')
@section('title', __('Subscription list'))
@section('content')
    <div class="card bg-white dark:bg-dark-eval-1">
        <div class="p-6 rounded-t rounded-r mb-0 border-b border-blueGray-200">
            <div class="card-header-container flex flex-wrap">
                <h6 class="text-xl font-bold text-gray-700 dark:text-gray-300">
                    {{ __('Subscription list') }}
                </h6>
            </div>
        </div>
        <div class="p-4">
            <div class="pt-3">
                <table class="w-full rounded-t-lg m-5 mx-auto bg-gray-800 text-gray-200">
                    <thead>
                        <tr class="text-left border-b border-gray-300">
                            <th class="px-4 py-3">
                                {{ __('Subscription Name') }}
                            </th>
                            <th class="px-4 py-3">
                                {{ __('Subscription Details') }}
                            </th>
                            <th class="px-4 py-3">
                                {{ __('Price') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($subscriptions as $subscription)
                            <tr class="bg-gray-700 border-b border-gray-600">
                                <td class="px-4 py-3">
                                    {{ $subscription->name }}
                                </td>
                                <td class="px-4 py-3">
                                    {{ $subscription->details }}
                                </td>
                                <td class="px-4 py-3">
                                    {{ $subscription->pivot->price }} {{ config('settings.currency_symbol') }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td>{{ __('No entries found.') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
