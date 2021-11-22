@extends('layouts.dashboard')
@section('title', __('Show - ') . ($section->title))
@section('content')

    <div class="card bg-white dark:bg-dark-eval-1">
        <div class="p-6 rounded-t rounded-r mb-0 border-b border-blueGray-200">
            <div class="card-header-container flex flex-wrap">
                <h6 class="text-xl font-bold text-gray-700 dark:text-gray-300">
                    {{ $section->title }}
                </h6>
                <div class="float-right">
                    <a href="{{ route('admin.pages.edit', $page) }}" class="btn rounded-md mb-4 md:text-sm sm:text-xs font-medium border-0 focus:outline-none focus:ring transition bg-purple-600 text-white hover:text-purple-800 hover:bg-purple-100 active:bg-purple-200 focus:ring-purple-300">
                        {{ __('Edit') }}
                    </a>
                <a href="{{ route('admin.pages.index') }}" class="btn rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition bg-gray-300 text-black hover:text-purple-800 hover:bg-purple-200 active:bg-purple-200 focus:ring-purple-300">
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
                                {{ $section->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ __('Content') }}
                            </th>
                            <td>
                                {!! clean($section->description) !!}
                                
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ __('Image') }}
                            </th>
                            <td>
                                @if ($section->image != null)
                                <img src="{{ asset('uploads/photos' . $post->image) }}" id="image"
                                    style="width: 150px; height: 150px;">
                                @else
                                    <img src="https://via.placeholder.com/250x200?text=Placeholder+Image" id="logoImg"
                                        style="width: 150px; height: 150px;">
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mb-4">
                <a href="{{ route('admin.section.index') }}" class="btn rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition bg-gray-300 text-black hover:text-purple-800 hover:bg-purple-200 active:bg-purple-200 focus:ring-purple-300">
                    {{ __('Back') }}
                </a>
            </div>
        </div>
    </div>
@endsection
