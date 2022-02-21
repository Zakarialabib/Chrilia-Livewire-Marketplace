@extends('layouts.web')
@section('content')
    <section class="hero">

        <div class="heading-container flex justify-center items-center w-full">
            <h2 class="text-2xl font-semibold leading-6 text-gray-800">{{ $data['data']['title'] }}</h2>
        </div>
        <div class="w-full flex flex-col items-center px-5 py-8 mx-auto  max-w-7xl sm:px-6 lg:px-8">
            <div class="mx-auto text-left">
                <div class="flex flex-wrap -mx-2 overflow-hidden sm:-mx-2 md:-mx-3 lg:-mx-2 xl:-mx-2">
                    @foreach ($data['data']['phones'] as $item)
                        <div
                            class="relative max-w-sm min-w-[340px] bg-white shadow-md rounded-3xl p-2 mx-1 my-3 cursor-pointer">
                            <div class="overflow-x-hidden rounded-2xl relative">
                                <img class="h-40 rounded-2xl w-full object-cover" src="{{ $item['image'] }}">
                            </div>
                            <div class="mt-4 pl-2 mb-2 flex justify-between ">
                                <div>
                                    <p class="text-lg font-semibold text-gray-900 mb-0">
                                        {{ $item['phone_name'] }}
                                    </p>
                                    <p class="text-md text-gray-800 mt-0">{{ $item['brand'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="p-4">
                    <div class="pt-3">
                        {{-- {{ $data['data']->links() }} --}}
                    </div>
                </div>
            </div>
    </section>
@endsection
