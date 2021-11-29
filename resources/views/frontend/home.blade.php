@extends('layouts.web')

@section('title', __('Home'))

@section('content')
    @php
    $s1 = \App\Models\Section::find(1);
    @endphp
    @if ($s1->position == 1)
        <section @if ($s1->bg_color)style="background-color:{{ $s1->bg_color }}"@endif class="bg-white h-full">
            <div class="grid grid-cols-12 gap-6 px-8 py-16 items-center">
                <div class="col-span-12 sm:col-span-12 md:col-span-5 lg:col-span-5 xxl:col-span-5 ">
                    <div class="py-4">
                        <h1
                            class="pb-4 text-green-550 text-4xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl tracking-tighter font-extrabold">
                            {{ $s1->title }}
                        </h1>
                        <p
                            class="text-xl sm:text-xl md:text-1xl lg:text-2xl xl:text-3xl font-semibold text-blue-550 pt-5 pb-5">
                            <span class="font-bold"> {{ $s1->featured_title }} </span>
                        </p>
                        <p>
                            {!! $s1->description !!}
                        </p>
                        <div class="flex pt-8">
                            @if ($s1->link == !null)
                                <button
                                    class="px-4 py-3 rounded-md uppercase font-medium border-0 focus:outline-none focus:ring transition bg-blue-600 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300">
                                    <a href="{{ $s1->link }}">
                                        {{ $s1->label }}
                                    </a>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-12 md:col-span-7 lg:col-span-7 xl:col-span-7 flex justify-center">
                    @if ($s1->image != null)
                        <img alt="{{ $s1->title }}" src="{{ asset('uploads/' . $s1->image) }}" />
                    @else
                        <img src="https://via.placeholder.com/300x450?text=300+x+450" alt="{{ $s1->title }}" />
                    @endif
                </div>
            </div>
        </section>
    @endif
    @php
    $s2 = \App\Models\Section::find(2);
    @endphp
    @if ($s2->position == 2)
        <section @if ($s2->bg_color)style="background-color:{{ $s2->bg_color }}"@endif class="h-full bg-gray-50 mx-auto py-10 px-4 sm:px-6 lg:px-8">
            <div class="text-center lg:px-4 lg:py-4 xl:py-5 xl:px-5">
                <h1
                    class="text-4xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl tracking-tighter font-extrabold text-blue-550 text-center">
                    {{ $s2->title }}
                </h1>
                <div class="grid grid-cols-12 gap-6 px-8 py-8 items-center">
                    <div class="col-span-12 sm:col-span-12 md:col-span-7 lg:col-span-7 xxl:col-span-7 ">
                        @if ($s2->image != null)
                            <img alt="{{ $s2->title }}" src="{{ asset('uploads/' . $s2->image) }}" />
                        @else
                            <img src="https://via.placeholder.com/300x450?text=300+x+450" alt="{{ $s2->title }}" />
                        @endif
                    </div>
                    <div class="col-span-12 sm:col-span-12 md:col-span-5 lg:col-span-5 xxl:col-span-5 ">
                        <div class="py-4">
                            <p>
                                {!! $s2->description !!}
                            </p>
                            @if ($s2->link == !null)
                                <button
                                    class="px-4 py-3 rounded-md uppercase font-medium border-0 focus:outline-none focus:ring transition bg-blue-600 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300">
                                    <a href="{{ $s2->link }}">
                                        {{ $s2->label }}
                                    </a>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @php
    $s3 = \App\Models\Section::find(3);
    @endphp
    @if ($s3->position == 3)
        <section @if ($s3->bg_color)style="background-color:{{ $s3->bg_color }}"@endif class="h-full bg-gray-100 py-10 mx-auto px-4 sm:px-6 lg:px-8">
            <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-12 xxl:col-span-12 ">
                <p
                    class="text-4xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl tracking-tighter font-extrabold text-center text-blue-550 pb-10">
                    {!! $s3->title !!}
                </p>
                <p>
                    {!! $s3->description !!}
                </p>
            </div>
            <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-12 xxl:col-span-12">
                <div class="flex justify-center items-center">

                    @if ($s3->image != null)
                        <img alt="{{ $s3->title }}" src="{{ asset('uploads/' . $s3->image) }}" />
                    @else
                        <img src="https://via.placeholder.com/600x250?text=600+x+250" alt="{{ $s3->title }}" />
                    @endif


                </div>
                @if ($s3->link == !null)
                    <div class="flex justify-center items-center py-3">

                        <button
                            class="px-4 py-3 rounded-md uppercase font-medium border-0 focus:outline-none focus:ring transition bg-blue-600 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300">
                            <a href="{{ $s3->link }}">
                                {{ $s3->label }}
                            </a>
                        </button>
                @endif
            </div>
        </section>
    @endif

    @include('components.home.our-services')

    <livewire:front.contact-form />

@endsection
