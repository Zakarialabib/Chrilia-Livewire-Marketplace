@extends('layouts.web')

@section('title', __('Pages'))

@section('content')
    <section>
        <div class="relative items-center w-full px-5 py-12 mx-auto md:px-12 lg:px-24 max-w-7xl">
            <div class="header flex items-end justify-between mb-12">
                <div class="title">
                    <p class="text-2xl font-light text-gray-400">
                        All article are verified by 2 experts and valdiate by the CTO
                    </p>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-12">
                @foreach ($pages as $page)
                    <div class="overflow-hidden shadow-lg rounded-lg h-90 w-60 md:w-80 cursor-pointer m-auto">
                        <a href="#" class="w-full block h-full">
                            @if ($page->image != null)
                            <img alt="{{ $page->title }}" src="{{ asset('uploads/' . $page->image) }}" class="max-h-40 w-full object-cover" />
                            @else
                            <img src="https://via.placeholder.com/250x200?text=Placeholder+Image" id="logoImg"
                                 alt="{{ $page->title }}" class="max-h-40 w-full object-cover" />
                            @endif
                            <div class="w-full p-4">
                                <a class="text-gray-800 text-xl font-medium mb-2"
                                    href="{{ route('page.show', $page->slug) }}">
                                    {{ $page->title }}
                                </a>
                                <p class="text-gray-400 font-light text-md">
                                    {!! $page->content !!}
                                </p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
