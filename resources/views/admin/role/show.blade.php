@extends('layouts.dashboard')
@section('title', __('Show - ') . ($role->title))
@section('content')

    <div class="card bg-white dark:bg-dark-eval-1">
        <div class="p-6 rounded-t rounded-r mb-0 border-b border-blueGray-200">
            <div class="card-header-container flex flex-wrap">
                <h6 class="text-xl font-bold text-gray-700 dark:text-gray-300">
                    {{ __('Role') }} : 
                    {{ $role->title }}
                </h6>
                <div class="float-right">
                    <a href="{{ route('admin.roles.edit', $role) }}" class="btn rounded-md mb-4 md:text-sm sm:text-xs font-medium border-0 focus:outline-none focus:ring transition bg-purple-600 text-white hover:text-purple-800 hover:bg-purple-100 active:bg-purple-200 focus:ring-purple-300">
                        {{ __('Edit') }}
                    </a>
                <a href="{{ route('admin.roles.index') }}" class="btn rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition bg-gray-300 text-black hover:text-purple-800 hover:bg-purple-200 active:bg-purple-200 focus:ring-purple-300">
                    {{ __('Back') }}
                </a>
            </div>
            </div>
        </div>

        <div class="p-4">
            <div class="pt-3">
                <table class="table table-auto table-view w-full">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ __('Title') }}
                            </th>
                            <td>
                                {{ $role->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ __('Permissions') }}
                            </th>
                            <td>
                                @foreach ($role->permissions as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->title }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
