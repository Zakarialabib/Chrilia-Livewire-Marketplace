@extends('layouts.web')

@section('title', __('Home'))

@section('content')
    
<livewire:front.phonesearch />    
<livewire:front.imeicheck />
    
    @php
    $sections = \App\Models\Section::where('status', 1)
        ->orderBy('position', 'desc')
        ->get();
    @endphp
    @foreach ($sections as $section)
        <section @if ($section->bg_color) style="background-color:{{ $section->bg_color }}" @endif
            class="bg-white h-full">
            <div class="grid grid-cols-12 gap-6 p-6 items-center">
                <div class="col-span-12 sm:col-span-12 md:col-span-5 lg:col-span-5 xxl:col-span-5 ">
                    <div class="py-4">
                        <h1
                            class="pb-4 text-green-550 text-4xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl tracking-tighter font-extrabold">
                            {{ $section->title }}
                        </h1>
                        <p
                            class="text-xl sm:text-xl md:text-1xl lg:text-2xl xl:text-3xl font-semibold text-blue-550 pt-5 pb-5">
                            <span class="font-bold"> {{ $section->featured_title }} </span>
                        </p>
                        <p>
                            {!! $section->description !!}
                        </p>
                        @if ($section->link == !null)
                            <div class="flex pt-8">
                                <button
                                    class="px-4 py-3 rounded-md uppercase font-medium border-0 focus:outline-none focus:ring transition bg-blue-600 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300">
                                    <a href="{{ $section->link }}">
                                        {{ $section->label }}
                                    </a>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-12 md:col-span-7 lg:col-span-7 xl:col-span-7 flex justify-center">
                    @if ($section->image != null)
                        <img alt="{{ $section->title }}" src="{{ asset('uploads/' . $section->image) }}"
                            class="w-10/12 h-5/6 rounded-full shadow-lg" />
                    @else
                        <img src="https://via.placeholder.com/300x450?text=300+x+450" alt="{{ $section->title }}" />
                    @endif
                </div>
            </div>
        </section>
    @endforeach

    <livewire:front.contact-form />

@endsection
