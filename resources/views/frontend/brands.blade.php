@extends('layouts.web')
@section('content')
    <section class="hero">

        <div class="heading-container absolute flex justify-center items-center w-full">

        </div>
        <div class="w-full flex flex-col items-center px-5 py-8 mx-auto  max-w-7xl sm:px-6 lg:px-8">
            <div class="mx-auto text-left">
                <div class="flex flex-wrap -mx-2 overflow-hidden sm:-mx-2 md:-mx-3 lg:-mx-2 xl:-mx-2">
                    @foreach ($data['data'] as $item)
                        <div
                            class="my-2 px-2 py-4 w-1/2 overflow-hidden sm:my-2 sm:px-2 sm:w-1/2 md:my-3 md:px-3 md:w-1/4 lg:my-2 lg:px-2 lg:w-1/4 xl:my-2 xl:px-2 xl:w-1/4 bg-white shadow rounded-lg relative">
                            <div class="md:flex items-center justify-between">
                                <h2 class="text-2xl font-semibold leading-6 text-gray-800">
                                    <a href="{{ route('brand.show', $item['brand_slug']) }}">
                                        {{ $item['brand_name'] }}</a>
                                </h2>
                                <p class="text-2xl font-semibold md:mt-0 mt-4 leading-6 text-gray-800">
                                    {{ $item['device_count'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    </section>
@endsection
