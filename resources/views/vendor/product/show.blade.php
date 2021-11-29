@extends('layouts.dashboard')
@section('title', __('Show - ') . ($product->name))
@section('content')
<div class="card bg-white dark:bg-dark-eval-1">
    <div class="p-6 rounded-t rounded-r mb-0 border-b border-blueGray-200">
        <div class="card-header-container flex flex-wrap">
            <h6 class="text-xl font-bold text-gray-700 dark:text-gray-300">
                {{ __('Product') }} :
                {{ $product->name }} - {{ $product->code }} 
            </h6>
            <div class="float-right">
                <a href="{{ route('admin.products.edit', $product) }}"
                    class="md:text-sm sm:text-xs bg-blue-900 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300 text-sm font-bold uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150">
                    {{ __('Edit') }}
                </a>
                <a href="{{ route('admin.products.index') }}"
                    class="btn rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition bg-gray-300 text-black hover:text-blue-800 hover:bg-blue-200 active:bg-blue-200 focus:ring-blue-300">
                    {{ __('Go back') }}
                </a>
            </div>
        </div>
    </div>

    <div class="p-4">
        <div class="pt-3">
            <table class="table table-view w-full">
                <tbody>
                    <tr>
                        <th>
                            {{ __('Code') }}
                        </th>
                        <td>
                            {{ $product->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ __('Name') }}
                        </th>
                        <td>
                            {{ $product->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ __('Image') }}
                        </th>
                        <td>
                            @if ($product->image != null)
                            <img alt="{{ $product->name }}" src="{{ asset('uploads/' . $product->image) }}"
                                class="w-full object-cover" />
                        @else
                            <img src="https://via.placeholder.com/250x200?text=Placeholder+Image" id="logoImg"
                                alt="{{ $product->name }}" class="max-h-40 w-full object-cover" />
                        @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ __('Description') }}
                        </th>
                        <td>
                            {{ $product->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ __('Category') }}
                        </th>
                        <td>
                            @switch($product->category)
                            @case(\App\Models\Product::CAT_NEW)
                            <span class="badge text-white bg-blue-500">{{__('New')}}</span>
                                @break
                            @case(\App\Models\Product::CAT_HOT)
                            <span class="badge text-white bg-orange-500">{{__('Hot')}}</span>
                                @break
                            @case(\App\Models\Product::CAT_SALE)
                            <span class="badge text-white bg-red-500">{{__('Sale')}}</span>
                                @break
                            @default
                        @endswitch
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ __('Status') }}
                        </th>
                        <td>
                            @if($product->status === \App\Models\Product::STATUS_ACITVE)
                                <span class="badge text-white bg-green-500">{{__('Active')}}</span>
                            @elseif($product->status === \App\Models\Product::STATUS_INACTIVE)
                                <span class="badge text-white bg-red-500">{{__('Inactive')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ __('Stock') }}
                        </th>
                        <td>
                            @if($product->stock === \App\Models\Product::STOCK_ACITVE)
                                <span class="badge text-white bg-green-500">{{__('Active')}}</span>
                            @elseif($product->stock === \App\Models\Product::STOCK_INACTIVE)
                                <span class="badge text-white bg-red-500">{{__('Inactive')}}</span>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection