@extends('layouts.dashboard')
@section('title', __('Show - ') . ($page->title))
@section('content')
    <div class="card bg-white dark:bg-dark-eval-1">
        <div class="p-6 rounded-t rounded-r mb-0 border-b border-blueGray-200">
            <div class="card-header-container flex flex-wrap">
                <h6 class="text-xl font-bold text-gray-700 dark:text-gray-300">
                    {{ $page->title }}
                </h6>
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
                                {{ $page->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ __('Content') }}
                            </th>
                            <td>
                                {{ $page->content }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ __('Image') }}
                            </th>
                            <td>
                                {{ $page->image }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mb-4">
                <a href="{{ route('admin.pages.index') }}" class="btn rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition bg-gray-300 text-black hover:text-purple-800 hover:bg-purple-200 active:bg-purple-200 focus:ring-purple-300">
                    {{ __('Back') }}
                </a>
            </div>
        </div>
    </div>
@endsection
