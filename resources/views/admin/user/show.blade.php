@extends('layouts.dashboard')
@section('title', __('Show - ') . ($user->name))
@section('content')

    <div class="card bg-white dark:bg-dark-eval-1">
        <div class="p-6 rounded-t rounded-r mb-0 border-b border-blueGray-200">
            <div class="card-header-container flex flex-wrap">
                <h6 class="text-xl font-bold text-gray-700 dark:text-gray-300">
                    {{ __('User') }} :
                    {{ $user->name }}
                </h6>
                <div class="float-right">
                        <a href="{{ route('admin.users.edit', $user) }}" class="btn rounded-md mb-4 md:text-sm sm:text-xs font-medium border-0 focus:outline-none focus:ring transition bg-purple-600 text-white hover:text-purple-800 hover:bg-purple-100 active:bg-purple-200 focus:ring-purple-300">
                            {{ __('Edit') }}
                        </a>
                    <a href="{{ route('admin.users.index') }}" class="btn rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition bg-gray-300 text-black hover:text-purple-800 hover:bg-purple-200 active:bg-purple-200 focus:ring-purple-300">
                        {{ __('Back') }}
                    </a>
                </div>
            </div>
        </div>

        @if ($user->isClient())
            <div class="card-body flex flex-wrap">
                @if ($user->orderInPaidTotal())
                    <div class="w-1/3 px-2 py-3">
                        <!--begin::Tiles Widget 12-->
                        <div class="flex flex-col justify-center px-4 py-4 bg-white border border-gray-300 rounded">
                            {{-- <span class="">Orders</span> --}}
                            <div class="text-3xl font-semibold text-center text-gray-800">{{ $user->orderInPaidTotal() }}
                                {{ config('settings.currency_symbol') }}</div>
                            <a href="#" class="text-lg text-center text-gray-500">{{('Orders InPaid') }}</a>
                        </div>
                        <!--end::Tiles Widget 12-->
                    </div>
                @endif
                @if ($user->orderPaidTotal())
                    <div class="w-1/3 px-2 py-3">
                        <!--begin::Tiles Widget 12-->
                        <div class="flex flex-col justify-center px-4 py-4 bg-white border border-gray-300 rounded">
                            {{-- <span class="">Orders</span> --}}
                            <div class="text-3xl font-semibold text-center text-gray-800">{{ $user->orderPaidTotal() }} {{ config('settings.currency_symbol') }}
                            </div>
                            <a href="#" class="text-lg text-center text-gray-500">{{('Orders Paid') }}</a>
                        </div>
                        <!--end::Tiles Widget 12-->
                    </div>
                @endif
                @if ($user->paymentTotal())
                    <div class="w-1/3 px-2 py-3">
                        <!--begin::Tiles Widget 12-->
                        <div class="flex flex-col justify-center px-4 py-4 bg-white border border-gray-300 rounded">
                            {{-- <span class="">Orders</span> --}}
                            <div class="text-3xl font-semibold text-center text-gray-800">{{ $user->paymentTotal() }} {{ config('settings.currency_symbol') }}
                            </div>
                            <a href="#" class="text-lg text-center text-gray-500">{{('Payments') }}</a>
                        </div>
                        <!--end::Tiles Widget 12-->
                    </div>
                @endif
            </div>
        @endif
        @if ($user->isAdmin())
            <div class="card-body flex flex-wrap">
                @if ($user->orderInPaidTotal())
                    <div class="w-1/3 px-2 py-3">
                        <!--begin::Tiles Widget 12-->
                        <div class="flex flex-col justify-center px-4 py-4 bg-white border border-gray-300 rounded">
                            {{-- <span class="">Orders</span> --}}
                            <div class="text-3xl font-semibold text-center text-gray-800">{{ $user->orderInPaidTotal() }}
                                {{ config('settings.currency_symbol') }}</div>
                            <a href="#" class="text-lg text-center text-gray-500">{{('Orders InPaid') }}</a>
                        </div>
                        <!--end::Tiles Widget 12-->
                    </div>
                @endif
                @if ($user->orderPaidTotal())
                    <div class="w-1/3 px-2 py-3">
                        <!--begin::Tiles Widget 12-->
                        <div class="flex flex-col justify-center px-4 py-4 bg-white border border-gray-300 rounded">
                            {{-- <span class="">Orders</span> --}}
                            <div class="text-3xl font-semibold text-center text-gray-800">{{ $user->orderPaidTotal() }} {{ config('settings.currency_symbol') }}
                            </div>
                            <a href="#" class="text-lg text-center text-gray-500">{{('Orders Paid') }}</a>
                        </div>
                        <!--end::Tiles Widget 12-->
                    </div>
                @endif
            </div>
        @endif

        <div class="p-4">
            <div class="">
                    <table class=" table table-auto table-view w-full">
                <tbody class="bg-white">
                    <tr>
                        <th>
                            {{ __('Name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ __('Email') }}
                        </th>
                        <td>
                            <a class="link-light-blue" href="mailto:{{ $user->email }}">
                                <i class="far fa-envelope fa-fw">
                                </i>
                                {{ $user->email }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ __('Phone') }}
                        </th>
                        <td>
                            {{ $user->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ __('Company name') }}
                        </th>
                        <td>
                            {{ $user->company_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ __('Bank name') }}
                        </th>
                        <td>
                            {{ $user->bank_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ __('Rib number') }}
                        </th>
                        <td>
                            {{ $user->rib_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ __('Address') }}
                        </th>
                        <td>
                            {{ $user->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ __('Roles') }}
                        </th>
                        <td>
                            @foreach ($user->roles as $key => $entry)
                                <span class="badge badge-relationship">{{ $entry->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
                </table>
            </div>
            {{-- @if (!$user->isAdmin()) --}}
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
                        @forelse ($user->subscriptions as $subscription)
                            <tr class="bg-gray-700 border-b border-gray-600">
                                <td class="px-4 py-3">
                                    {{ $subscription->name }}
                                </td>
                                <td class="px-4 py-3">
                                    {{ $subscription->details }}
                                </td>
                                <td class="px-4 py-3">
                                    {{ $subscription->pivot->price }}
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