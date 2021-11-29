@extends('layouts.dashboard')
@section('title', __('Product list'))
@section('content')
    <div class="card bg-white dark:bg-dark-eval-1">
        <div class="p-6 rounded-t rounded-r mb-0 border-b border-blueGray-200">
            <div class="card-header-container flex flex-wrap">
                <h6 class="text-xl font-bold text-gray-700 dark:text-gray-300">
                    {{ __('Product list') }}
                </h6>
                <div class="flex">
                    <form action="{{ route('vendor.product-import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="excel" id="excel" placeholder="select a file" />
                        <button type="submit"
                        class="leading-4 md:text-sm sm:text-xs bg-blue-900 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300 font-medium uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                        {{ __('Import') }}
                    </button>
                </form>
             </div>

                @can('vendor_product_management')
                    <div class="flex">
                        <a class="md:text-sm sm:text-xs bg-blue-900 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300 text-sm font-bold uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                            href="{{ route('vendor.products.create') }}">
                            {{ __('Create product') }}
                        </a>
                    </div>
                @endcan
            </div>
        </div>
        <div class="p-4">
            @livewire('vendor.product.index')
        </div>
    </div>
@endsection
