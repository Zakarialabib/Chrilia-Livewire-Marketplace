@extends('layouts.dashboard')
@section('title', __('Show - ') . ($subscription->id))
@section('content')

    <div class="card bg-white dark:bg-dark-eval-1">
        <div class="p-6 rounded-t rounded-r mb-0 border-b border-blueGray-200">
            <div class="card-header-container flex flex-wrap">
                <h6 class="text-xl font-bold text-gray-700 dark:text-gray-300">
                    {{ __('Edit Subscription') }} :
                    {{ $subscription->id }}
                </h6>
                <div class="float-right">
                    <a href="{{ route('admin.subscriptions.edit', $subscription) }}" class="md:text-sm sm:text-xs bg-blue-900 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300 text-sm font-bold uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150">
                        {{ __('Edit') }}
                    </a>
                <a href="{{ route('admin.subscriptions.index') }}" class="btn rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition bg-gray-300 text-black hover:text-blue-800 hover:bg-blue-200 active:bg-blue-200 focus:ring-blue-300">
                    {{ __('Go back') }}
                </a>
            </div>
            </div>
        </div>

        <div class="p-4">
            <div class="pt-3">
                <table class="table table-auto table-view w-full">
                    <tbody>
                        <tr>
                            <th>
                                {{ __('Subscription name') }}
                            </th>
                            <td>
                                {{ $subscription->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ __('Subscription details') }}
                            </th>
                            <td>
                                {{ $subscription->details }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
