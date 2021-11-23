<div>
    <div class="flex flex-wrap px-10">
        <div class="lg:w-1/2 md:w-1/2 sm:w-full flex flex-wrap my-md-0 my-2">
            <select wire:model="perPage"
                class="w-20 block p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm focus:shadow-outline-blue focus:border-purple-300 mr-3">
                @foreach ($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>
            <form wire:submit.prevent="filterDate" class="flex flex-wrap">
                    <x-select-list class="block appearance-none w-30 py-2 px-2 mb-1" id="vendor_id" name="vendor_id"
                        wire:model="vendor_id" :options="$this->listsForFields['vendors']" />
            </form>
        </div>
        <div class="lg:w-1/2 md:w-1/2 sm:w-full my-2 my-md-0">
            <input type="text" wire:model.debounce.300ms="search" placeholder="{{ __('Search') }}"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500" />
        </div>
    </div>

    <div wire:loading.flex> {{ __('Loading') }}</div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-12 py-6">
        @forelse ($products as $product)
            <div class="overflow-hidden shadow-lg rounded-lg h-90 w-60 md:w-80 cursor-pointer m-auto">
                <a href="#" class="w-full block h-full">
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
                        <div class="inline-flex float-right py-2">
                            <p class="text-red-400 font-bold text-md mr-2">
                                {{ $product->wholesale_price }} {{ config('settings.currency_symbol') }}  
                            </p>
                            @if ($product->stock === \App\Models\Product::STOCK_ACITVE)
                                <span class="badge text-white bg-green-500"> {{ __('Active') }}</span>
                            @elseif($product->stock === \App\Models\Product::STOCK_INACTIVE)
                                <span class="badge text-white bg-red-500"> {{ __('Inactive') }}</span>
                            @endif      
                        </div>
                    </div>
                </a>
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
