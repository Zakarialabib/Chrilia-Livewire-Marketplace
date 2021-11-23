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
        </div>
    </div>

    <div class="p-4">
        <div class="pt-3">
            <table class="table table-view w-full">
                <tbody class="bg-white">
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
                            {{ $product->image }}
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
                            {{ __('Status') }}
                        </th>
                        <td>
                            @if($product->status === \App\Models\Product::STOCK_ACITVE)
                                <span class="badge text-white bg-green-500">{{__('Active')}}</span>
                            @elseif($product->status === \App\Models\Product::STOCK_INACTIVE)
                                <span class="badge text-white bg-red-500">{{__('Inactive')}}</span>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="my-4">
            <a href="{{ route('vendor.products.index') }}" class="btn rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition bg-gray-300 text-black hover:text-purple-800 hover:bg-purple-200 active:bg-purple-200 focus:ring-purple-300">
                  {{ __('Back') }}
            </a>
        </div>
    </div>
</div>
@endsection