@extends('layouts.dashboard')
@section('title', __('Section List'))
@section('content')
<div class="card bg-white dark:bg-dark-eval-1">
    <div class="p-6 rounded-t rounded-r mb-0 border-b border-slate-200">
        <div class="card-header-container flex flex-wrap">
            <h6 class="flex-grow text-xl font-bold text-zinc-700 dark:text-zinc-300 mb-4">
                {{ __('Section list') }}
            </h6>

            <a class="leading-4 md:text-sm sm:text-xs bg-green-500 text-white hover:text-green-800 hover:bg-green-100 active:bg-green-200 focus:ring-green-300 font-medium uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 text-center" 
                href="{{ route('admin.sections.create') }}" >
                {{ __('Create Section') }}
            </a>

        </div>
    </div>
    <div class="p-4">
        @livewire('admin.section.index')
    </div>
</div>
@endsection