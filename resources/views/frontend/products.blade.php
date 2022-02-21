@extends('layouts.web')

@section('title', __('All Products'))

@section('content')
    <section>
        <div class="relative items-center w-full px-5 py-12 mx-auto md:px-12 lg:px-24 max-w-7xl">
            <div class="header flex items-end justify-between mb-12">
                <div class="title">
                    <p class="text-2xl font-light text-gray-400">
                        All Products
                    </p>
                </div>
            </div>
            @livewire('front.products')
        </div>
    </section>
@endsection
