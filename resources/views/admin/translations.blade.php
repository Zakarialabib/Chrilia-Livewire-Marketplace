@extends('layouts.dashboard')
@section('title', __('Translations'))
@section('content')
<div class="card bg-white dark:bg-dark-eval-1">
    <div class="p-6 rounded-t rounded-r mb-0 border-b border-blueGray-200">
        <div class="card-header-container flex flex-wrap">
            <h6 class="text-xl font-bold text-gray-700 dark:text-gray-300">
                {{ __('Translations') }}
            </h6>
            <div class="inline-flex">
                <button type="button" class="leading-4 md:text-sm sm:text-xs bg-blue-900 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300 font-medium uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" 
                x-data="{}" x-on:click="window.livewire.emitTo('admin.translations.add-new-language', 'show')"
                wire:loading.attr="disabled">
                {{ __('Create Language') }}
            </button>
            <a href="{{ url("admin/languages") }}" class="leading-4 md:text-sm sm:text-xs bg-blue-900 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300 font-medium uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                {{ __('Translation') }}
            </a>
        </div>
        </div>
    </div>
    <div class="p-4">
        @livewire('translations')
    </div>
</div>
@endsection
