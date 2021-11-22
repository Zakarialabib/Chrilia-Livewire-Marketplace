@extends('layouts.dashboard')
@section('title', __('UserAlert List'))
@section('content')
    <div class="row">
        <div class="card bg-white dark:bg-dark-eval-1">
            <div class="p-6 rounded-t rounded-r mb-0 border-b border-blueGray-200">
                <div class="card-header-container flex flex-wrap">
                    <h6 class="text-xl font-bold text-gray-700 dark:text-gray-300">
                        {{ __('User Alerts') }}
                    </h6>
                    @can('user_alert_create')
                        <a class="btn rounded-md mb-4 md:text-sm sm:text-xs font-medium border-0 focus:outline-none focus:ring transition bg-purple-600 text-white hover:text-purple-800 hover:bg-purple-100 active:bg-purple-200 focus:ring-purple-300"
                            href="{{ route('admin.user-alerts.create') }}">
                            {{ __('Create Alert') }}
                        </a>
                    @endcan
                </div>
            </div>
            <div class="p-4">
                @livewire('user-alert.index')
            </div>
        </div>
    </div>
@endsection
