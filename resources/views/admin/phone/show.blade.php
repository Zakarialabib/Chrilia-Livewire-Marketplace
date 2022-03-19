@extends('layouts.dashboard')
@section('title', __('Phone list'))
@section('content')
    <div class="card bg-white dark:bg-dark-eval-1">
        <div class="p-6 rounded-t rounded-r mb-0 border-b border-blueGray-200">
            <div class="card-header-container flex flex-wrap">
                <h6 class="text-xl font-bold text-gray-700 dark:text-gray-300">
                    {{ __('Phone list') }}
                </h6>
            </div>
        </div>
        <div class="flex flex-wrap -mx-2 overflow-hidden sm:-mx-2 md:-mx-3 lg:-mx-2 xl:-mx-2">
            @if ($data['status'] === true)
            @foreach ($data['data']['phones'] as $item)
            <div class="relative max-w-sm min-w-[340px] bg-white shadow-md rounded-3xl p-2 mx-1 my-3 cursor-pointer">
                <div class="overflow-x-hidden rounded-2xl relative">
                    <a href="{{ route('phone.show', $item['slug']) }}">
                        <img class="h-40 rounded-2xl w-full object-contain" src="{{ $item['image'] }}">
                    </a>
                </div>
                <div class="mt-4 pl-2 mb-2 flex justify-between ">
                    <div class="w-full">
                        <p class="text-lg font-semibold text-gray-900 mb-0 text-center">
                            <a href="{{ route('phone.show', $item['slug']) }}">
                                {{ $item['phone_name'] }}
                            </a>
                        </p>
                        <p class="text-md text-gray-800 mt-0 text-center">{{ $item['brand'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            @foreach ($phones as $item)
            <div class="relative max-w-sm bg-white w-1/4 p-2 mx-1 my-3 cursor-pointer">
                <div class="overflow-x-hidden rounded-2xl relative">
                    <a href="{{ route('phone.show', $item->slug) }}">
                        <img class="h-40 rounded-2xl w-full object-contain" src="{{ $item->image }}">
                    </a>
                </div>
                <div class="mt-4 pl-2 mb-2 flex justify-between ">
                    <div class="w-full">
                        <p class="text-lg font-semibold text-gray-900 mb-0 text-center">
                            <a href="{{ route('phone.show', $item->slug) }}">
                                {{ $item->phone_name }}
                            </a>
                        </p>
                        <p class="text-md text-gray-800 mt-0 text-center">{{ $item->brand }}</p>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
@endsection
