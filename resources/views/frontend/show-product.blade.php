@extends('layouts.web')
@section('content')
    <section class="p-10">
        <h6 class="text-xl text-center font-bold text-gray-700 dark:text-gray-300">
            <a href="{{ route('home')}}">{{__('Home')}} </a>/ 
            <a href="{{ route('store.show', $product->vendor->company_name) }}">
                {{ $product->vendor->company_name }}
            </a> /
            {{ $product->name }} - {{ $product->code }}
        </h6>

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
                                {{ __('Video') }}
                            </th>
                            <td>
                                @if ($product->embed_video != null)
                                {!! $product->embed_video !!}
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
                                        <span class="badge text-white bg-blue-500">{{ __('New') }}</span>
                                    @break
                                    @case(\App\Models\Product::CAT_HOT)
                                        <span class="badge text-white bg-orange-500">{{ __('Hot') }}</span>
                                    @break
                                    @case(\App\Models\Product::CAT_SALE)
                                        <span class="badge text-white bg-red-500">{{ __('Sale') }}</span>
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
                                @if ($product->status === \App\Models\Product::STATUS_ACITVE)
                                    <span class="badge text-white bg-green-500">{{ __('Active') }}</span>
                                @elseif($product->status === \App\Models\Product::STATUS_INACTIVE)
                                    <span class="badge text-white bg-red-500">{{ __('Inactive') }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ __('Stock') }}
                            </th>
                            <td>
                                @if ($product->stock === \App\Models\Product::STOCK_ACITVE)
                                    <span class="badge text-white bg-green-500">{{ __('Active') }}</span>
                                @elseif($product->stock === \App\Models\Product::STOCK_INACTIVE)
                                    <span class="badge text-white bg-red-500">{{ __('Inactive') }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection