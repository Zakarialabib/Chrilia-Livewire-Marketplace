<div class="lg:w-1/2 md:w-1/2 sm:w-full flex flex-wrap my-md-0 my-2">
    <select wire:model="category" name="category" id="category"
        class="w-32 p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm focus:shadow-outline-blue focus:border-blue-300 mr-3">
        <option value="">{{ __('Category') }}</option>
        <option value='{{ App\Models\Product::CAT_HOT }}'>{{ __('Hot') }}</option>
        <option value='{{ App\Models\Product::CAT_NEW }}'>{{ __('New') }}</option>
        <option value='{{ App\Models\Product::CAT_SALE }}'>{{ __('Sale') }}</option>
    </select>

    <button
        class="leading-4 md:text-sm sm:text-xs bg-blue-900 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300 font-medium uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
        sortable wire:click="sortBy('updated_at')" :direction="$sorts['updated_at'] ?? null">
        {{ __('Newest') }} / {{ __('Oldest') }}
    </button>

    <div class="lg:w-1/2 md:w-1/2 sm:w-full my-2 my-md-0">
        <input type="text" wire:model.debounce.300ms="search" placeholder="{{ __('Search') }}"
            class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500" />
    </div>
</div>
<div class="w-full flex flex-col items-center px-5 py-8 mx-auto  max-w-7xl sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-12 py-6">
        @forelse ($products as $product)
            <div class="overflow-hidden shadow-lg rounded-lg h-90 w-60 md:w-80 cursor-pointer m-auto">
                @if ($product->image != null)
                    <img alt="{{ $product->name }}" src="{{ asset('uploads/' . $product->image) }}"
                        class="max-h-40 w-full object-cover" />
                @else
                    <img src="https://via.placeholder.com/250x200?text=Placeholder+Image" id="logoImg"
                        alt="{{ $product->name }}" class="max-h-40 w-full object-cover" />
                @endif
                <div class="w-full p-4">
                    <p class="text-gray-400 font-light text-md">
                        {{ $product->name }}
                    </p>
                    <p class="text-red-400 font-bold text-md mr-2">
                        {{ $product->wholesale_price }} {{ config('settings.currency_symbol') }}
                    </p>
                    <div class="flex flex-wrap">
                        <div class="lg:w-1/2 sm:w-full inline-flex">
                            <a href="{{ route('store.show', $product->vendor->company_name) }}"
                                class="text-blue-500">
                                <x-heroicon-o-home class="w-5 h-5 text-blue-500" />
                            </a>
                            <a href="https://wa.me/{{ $product->vendor->whatsapp_number }}" target="_blank"
                                class="ml-2  text-green-500 hover:text-blue-500"><span
                                    class="sr-only">{{ __('Whatsapp') }}</span>
                                <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    class="h-4 w-4">
                                    <path
                                        d="M 12.011719 2 C 6.5057187 2 2.0234844 6.478375 2.0214844 11.984375 C 2.0204844 13.744375 2.4814687 15.462563 3.3554688 16.976562 L 2 22 L 7.2324219 20.763672 C 8.6914219 21.559672 10.333859 21.977516 12.005859 21.978516 L 12.009766 21.978516 C 17.514766 21.978516 21.995047 17.499141 21.998047 11.994141 C 22.000047 9.3251406 20.962172 6.8157344 19.076172 4.9277344 C 17.190172 3.0407344 14.683719 2.001 12.011719 2 z M 12.009766 4 C 14.145766 4.001 16.153109 4.8337969 17.662109 6.3417969 C 19.171109 7.8517969 20.000047 9.8581875 19.998047 11.992188 C 19.996047 16.396187 16.413812 19.978516 12.007812 19.978516 C 10.674812 19.977516 9.3544062 19.642812 8.1914062 19.007812 L 7.5175781 18.640625 L 6.7734375 18.816406 L 4.8046875 19.28125 L 5.2851562 17.496094 L 5.5019531 16.695312 L 5.0878906 15.976562 C 4.3898906 14.768562 4.0204844 13.387375 4.0214844 11.984375 C 4.0234844 7.582375 7.6067656 4 12.009766 4 z M 8.4765625 7.375 C 8.3095625 7.375 8.0395469 7.4375 7.8105469 7.6875 C 7.5815469 7.9365 6.9355469 8.5395781 6.9355469 9.7675781 C 6.9355469 10.995578 7.8300781 12.182609 7.9550781 12.349609 C 8.0790781 12.515609 9.68175 15.115234 12.21875 16.115234 C 14.32675 16.946234 14.754891 16.782234 15.212891 16.740234 C 15.670891 16.699234 16.690438 16.137687 16.898438 15.554688 C 17.106437 14.971687 17.106922 14.470187 17.044922 14.367188 C 16.982922 14.263188 16.816406 14.201172 16.566406 14.076172 C 16.317406 13.951172 15.090328 13.348625 14.861328 13.265625 C 14.632328 13.182625 14.464828 13.140625 14.298828 13.390625 C 14.132828 13.640625 13.655766 14.201187 13.509766 14.367188 C 13.363766 14.534188 13.21875 14.556641 12.96875 14.431641 C 12.71875 14.305641 11.914938 14.041406 10.960938 13.191406 C 10.218937 12.530406 9.7182656 11.714844 9.5722656 11.464844 C 9.4272656 11.215844 9.5585938 11.079078 9.6835938 10.955078 C 9.7955938 10.843078 9.9316406 10.663578 10.056641 10.517578 C 10.180641 10.371578 10.223641 10.267562 10.306641 10.101562 C 10.389641 9.9355625 10.347156 9.7890625 10.285156 9.6640625 C 10.223156 9.5390625 9.737625 8.3065 9.515625 7.8125 C 9.328625 7.3975 9.131125 7.3878594 8.953125 7.3808594 C 8.808125 7.3748594 8.6425625 7.375 8.4765625 7.375 z" />
                                </svg>
                            </a>
                        </div>
                        <div class="lg:w-1/2 sm:w-full text-right">
                            
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
                            @if ($product->stock === \App\Models\Product::STOCK_ACITVE)
                                <span class="badge text-white bg-green-500"> {{ __('Active') }}</span>
                            @elseif($product->stock === \App\Models\Product::STOCK_INACTIVE)
                                <span class="badge text-white bg-red-500"> {{ __('Inactive') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @empty
            {{ __('No entries found.') }}
        @endforelse
    </div>
    <div class="p-4">
        <div class="pt-3">
            {{ $products->links() }}
        </div>
    </div>
</div>
