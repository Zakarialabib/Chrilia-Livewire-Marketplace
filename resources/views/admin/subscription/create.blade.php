@extends('layouts.dashboard')
@section('title', __('Create subscription'))
@section('content')

<div class="card bg-white dark:bg-dark-eval-1">
    <div class="p-6 rounded-t rounded-r mb-0 border-b border-blueGray-200">
        <div class="card-header-container flex flex-wrap">
            <h6 class="text-xl font-bold text-gray-700 dark:text-gray-300">
                {{ __('Create subscription') }}
            </h6>
        </div>
    </div>

    <div class="p-4">
        @livewire('subscription.create')
    </div>
</div>
@endsection